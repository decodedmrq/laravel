(function (exports) {
'use strict';

/**
 * Created by mon.ls on 11/7/2016.
 */
var Request = {
  _options: {
    method: 'get',
    data: {},
    headers: {},
    dataType: 'json',
  },
  _isUpload: false,
  _beforeSend: function () {},
  uploadFile: function uploadFile() {
    this._isUpload = true;
    return this;
  },
  before: function before(callback) {
    this._beforeSend = callback;
    return this;
  },
  headers: function headers(obj) {
    Object.assign(this._options.headers, obj);
    return this;
  },

  header: function header(key, val) {
    this.options.headers[key] = val;
    return this;
  },

  options: function options(obj) {
    Object.assign(this._options, obj);
    return this;
  },

  option: function option(key, val) {
    this._options[key] = val;
    return this;
  },

  data: function data(key, val) {
    if (typeof key === 'string' && val) {
      this._options.data[key] = val;
    }
    if (typeof key === 'object') {
      Object.assign(this._options.data, key);
    }
    return this;
  },
  get: function get(url) {
    return this._call(url);
  },

  post: function post(url) {
    this.option('method', 'post');
    return this._call(url);
  },

  put: function put(url) {
    this.option('method', 'put');
    return this._call(url);
  },

  patch: function patch(url) {
    this.option('method', 'patch');
    return this._call(url);
  },

  delete: function delete$1(url) {
    this.option('method', 'delete');
    return this._call(url);
  },

  _call: function _call(url) {
    this.option('beforeSend', this._beforeSend());
    if (this._isUpload) {
      this.option('processData', false);
      this.option('contentType', false);
    }
    return $.ajax(url, this._options);
  },
};

var Bootloader = {
  _scripts: [],
  _pendingScripts: [],
  _firstScript: document.scripts[0],
  stateChange: function stateChange() {
    // Execute as many scripts in order as we can
    var pendingScript;
    var firstScript = this._firstScript;
    var pendingScripts = this._pendingScripts;
    while (pendingScripts[0] && pendingScripts[0].readyState == 'loaded') {
      pendingScript = pendingScripts.shift();
      // avoid future loading events from this script (eg, if src changes)
      pendingScript.onreadystatechange = null;
      // can't just appendChild, old IE bug if element isn't closed
      firstScript.parentNode.insertBefore(pendingScript, firstScript);
    }
  },
  setScripts: function setScripts(list) {
    Object.assign(list, this._scripts);
    return this;
  },
  setScript: function setScript(path) {
    this._scripts.push(path);
    return this;
  },
  load: function load() {
    var firstScript = this._firstScript;
    var pendingScripts = this._pendingScripts;
    var script;
    var src;
    var stateChange = this.stateChange();
    // loop through our script urls
    while (src = this._scripts.shift()) {
      if ('async' in firstScript) { // modern browsers
        script = document.createElement('script');
        script.async = false;
        script.src = src;
        document.head.appendChild(script);
      } else if (firstScript.readyState) { // IE<10
        // create a script and add it to our todo pile
        script = document.createElement('script');
        pendingScripts.push(script);
        // listen for state changes
        script.onreadystatechange = stateChange;
        // must set src AFTER adding onreadystatechange listener
        // else we’ll miss the loaded event for cached scripts
        script.src = src;
      } else { // fall back to defer
        document.write('<script src="' + src + '" defer></' + 'script>');
      }
    }
  },

};

$.ajaxSetup({
  headers: {'X-CSRF-TOKEN': Security.csrfToken},
});

var lang = $('meta[name=AppContentLocale]').attr('content');
Request.get('/');
Bootloader.setScript(("/js/" + lang + ".js")).load();

}((this.App = this.App || {})));

//# sourceMappingURL=app.js.map
