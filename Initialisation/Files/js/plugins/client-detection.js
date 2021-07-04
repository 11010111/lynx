const BrowserDetection = (function () {
  /**
   * Detect browser and operating system information.
   *
   * @param {string} userAgent
   * @param {string} appVersion
   * @constructor
   */
  function BrowserDetect (userAgent, appVersion) {
    let _versionSearchString = ''

    /**
     * @param {array} data
     * @return {string|null}
     * @private
     */
    function _searchString (data) {
      for (let i = 0; i < data.length; i += 1) {
        let dataString = data[i].string,
          dataProp = data[i].prop

        _versionSearchString = data[i].versionSearch || data[i].identity

        if (dataString) {
          if (dataString.indexOf(data[i].subString) !== -1) {
            return data[i].identity
          }
        } else if (dataProp) {
          return data[i].identity
        }
      }

      return null
    }

    /**
     * @param {string} dataString
     * @return {number|null}
     * @private
     */
    function _searchVersion (dataString) {
      let index = dataString.indexOf(_versionSearchString)

      if (index === -1) {
        return null
      }

      return parseFloat(dataString.substring(index + _versionSearchString.length + 1))
    }

    let _dataBrowser = [
      {
        string: navigator.userAgent,
        subString: 'Chrome',
        identity: 'Chrome'
      },
      {
        string: navigator.userAgent,
        subString: 'OmniWeb',
        versionSearch: 'OmniWeb/',
        identity: 'OmniWeb'
      },
      {
        string: navigator.vendor,
        subString: 'Apple',
        identity: 'Safari',
        versionSearch: 'Version'
      },
      {
        prop: window.opera,
        identity: 'Opera',
        versionSearch: 'Version'
      },
      {
        string: navigator.vendor,
        subString: 'iCab',
        identity: 'iCab'
      },
      {
        string: navigator.vendor,
        subString: 'KDE',
        identity: 'Konqueror'
      },
      {
        string: navigator.userAgent,
        subString: 'Firefox',
        identity: 'Firefox'
      },
      {
        string: navigator.vendor,
        subString: 'Camino',
        identity: 'Camino'
      },
      { // for newer Netscapes (6+)
        string: navigator.userAgent,
        subString: 'Netscape',
        identity: 'Netscape'
      },
      {
        string: navigator.userAgent,
        subString: 'MSIE',
        identity: 'Explorer',
        versionSearch: 'MSIE'
      },
      {
        string: navigator.userAgent,
        subString: 'Trident',
        identity: 'Explorer',
        versionSearch: 'rv'
      },
      {
        string: navigator.userAgent,
        subString: 'Edge',
        identity: 'Edge'
      },
      {
        string: navigator.userAgent,
        subString: 'Gecko',
        identity: 'Mozilla',
        versionSearch: 'rv'
      },
      { // for older Netscapes (4-)
        string: navigator.userAgent,
        subString: 'Mozilla',
        identity: 'Netscape',
        versionSearch: 'Mozilla'
      }]

    let _dataOS = [
      {
        string: navigator.platform,
        subString: 'Win',
        identity: 'Windows'
      },
      {
        string: navigator.platform,
        subString: 'Mac',
        identity: 'Mac'
      },
      {
        string: navigator.userAgent,
        subString: 'iPhone',
        identity: 'iPhone/iPod'
      },
      {
        string: navigator.platform,
        subString: 'Linux',
        identity: 'Linux'
      }
    ]

    /**
     * Get the current used browser.
     *
     * @return {string}
     */
    this.getBrowser = () => {
      return _searchString(_dataBrowser) || 'An unknown browser'
    }

    /**
     * Get the current used browser version.
     *
     * @return {number|string}
     */
    this.getVersion = () => {
      return _searchVersion(userAgent) || _searchVersion(appVersion) || 'an unknown version'
    }

    /**
     * Get the current used operating system
     *
     * @return {string}
     */
    this.getOS = () => {
      return _searchString(_dataOS) || 'an unknown OS'
    }
  }

  return new BrowserDetect(navigator.userAgent, navigator.appVersion)
})();

const MobileDetection = (function () {
  /**
   * Detect mobile devices.
   *
   * @constructor
   */
  function MobileDetect () {

    /**
     * Check if the Browser is Android.
     *
     * @return {boolean}
     */
    this.isAndroid = () => {
      let result = navigator.userAgent.match(/Android/i)

      return result !== null
    }

    /**
     * Check if the Browser is BlackBerry.
     *
     * @return {boolean}
     */
    this.isBlackBerry = () => {
      let result = navigator.userAgent.match(/BlackBerry/i)

      return result !== null
    }

    /**
     * Check if the browser is IOS.
     *
     * @return {boolean}
     */
    this.isIOS = () => {
      let result = navigator.userAgent.match(/iPhone|iPad|iPod/i)

      return result !== null
    }

    /**
     * Check if the browser is Opera.
     *
     * @return {boolean}
     */
    this.isOpera = () => {
      let result = navigator.userAgent.match(/Opera Mini/i)

      return result !== null
    }

    /**
     * Check if the browser is Windows.
     *
     * @return {boolean}
     */
    this.isWindows = () => {
      let result = navigator.userAgent.match(/IEMobile/i)

      return result !== null
    }

    /**
     * Check if the current used device is mobile.
     *
     * @return {boolean}
     */
    this.isMobile = () => {
      return (this.isAndroid() || this.isBlackBerry() || this.isIOS() || this.isOpera() || this.isWindows())
    }
  }

  return new MobileDetect()
})();
