(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
	value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _jquery = require('./lib/jquery.es6');

var _Module2 = require('./Module.es6');

var _Module3 = _interopRequireDefault(_Module2);

var _Accordion_Changer = require('./Accordion_Changer.es6');

var _Accordion_Changer2 = _interopRequireDefault(_Accordion_Changer);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Accordion = function (_Module) {
	_inherits(Accordion, _Module);

	function Accordion($dom) {
		_classCallCheck(this, Accordion);

		return _possibleConstructorReturn(this, (Accordion.__proto__ || Object.getPrototypeOf(Accordion)).call(this, $dom));
	}

	_createClass(Accordion, [{
		key: 'init',
		value: function init() {
			var _this2 = this;

			this.toogleItem = this.$dom.find(".toggle");
			this.toogleItem.click(function (e) {
				e.preventDefault();

				var $this = (0, _jquery.$)(_this2.toogleItem.context.activeElement);

				if ($this.next().hasClass('show')) {
					$this.next().removeClass('show');
					$this.next().slideUp(350);
					$this.context.innerText = $this.context.innerText.replace(/Active/gi, '');
				} else {
					$this.parent().parent().find('li .inner').removeClass('show');
					$this.parent().parent().find('li .inner').slideUp(350);
					$this.next().toggleClass('show');
					$this.next().slideToggle(350);
				}

				_this2.changer = new _Accordion_Changer2.default($this);
				_this2.changer.init();
			});
		}
	}]);

	return Accordion;
}(_Module3.default);

exports.default = Accordion;

},{"./Accordion_Changer.es6":2,"./Module.es6":3,"./lib/jquery.es6":5}],2:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
	value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _jquery = require('./lib/jquery.es6');

var _Module2 = require('./Module.es6');

var _Module3 = _interopRequireDefault(_Module2);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Accordion_Changer = function (_Module) {
	_inherits(Accordion_Changer, _Module);

	function Accordion_Changer($dom) {
		_classCallCheck(this, Accordion_Changer);

		return _possibleConstructorReturn(this, (Accordion_Changer.__proto__ || Object.getPrototypeOf(Accordion_Changer)).call(this, $dom));
	}

	_createClass(Accordion_Changer, [{
		key: 'init',
		value: function init() {
			var $this = (0, _jquery.$)(this);
			var $elem = $this['0'].$dom.context;
			var $element = (0, _jquery.$)($elem);
			console.log('You clicked on the ' + $elem.innerText);

			if ($element.next().hasClass('show') && $elem.innerText.indexOf('Active') == -1) {
				$elem.innerText = 'Active ' + $elem.innerText;
			} else {
				//console.log($elem.parent().siblings().find('a').innerText);
				$elem.innerText = $elem.innerText.replace(/Active/gi, '');
			}
		}
	}]);

	return Accordion_Changer;
}(_Module3.default);

exports.default = Accordion_Changer;

},{"./Module.es6":3,"./lib/jquery.es6":5}],3:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
    value: true
});

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Module = function Module($dom) {
    _classCallCheck(this, Module);

    this.$dom = $dom;
};

exports.default = Module;

},{}],4:[function(require,module,exports){
'use strict';

var _jquery = require('./lib/jquery.es6');

var _Accordion = require('./Accordion.es6');

var _Accordion2 = _interopRequireDefault(_Accordion);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

(0, _jquery.$)(document).ready(function () {

    var accordion = new _Accordion2.default((0, _jquery.$)('body'));
    accordion.init();
});

},{"./Accordion.es6":1,"./lib/jquery.es6":5}],5:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
var $ = window.jQuery;
var jQuery = window.jQuery;

exports.$ = $;
exports.jQuery = jQuery;

},{}]},{},[4])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJzY3JpcHRcXEFjY29yZGlvbi5lczYiLCJzY3JpcHRcXEFjY29yZGlvbl9DaGFuZ2VyLmVzNiIsInNjcmlwdFxcTW9kdWxlLmVzNiIsInNjcmlwdFxcYXBwLmVzNiIsInNjcmlwdFxcbGliXFxqcXVlcnkuZXM2Il0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBOzs7Ozs7Ozs7QUNBQTs7QUFDQTs7OztBQUNBOzs7Ozs7Ozs7Ozs7SUFFTSxTOzs7QUFFTCxvQkFBWSxJQUFaLEVBQWlCO0FBQUE7O0FBQUEsK0dBQ1YsSUFEVTtBQUVoQjs7Ozt5QkFFSztBQUFBOztBQUNMLFFBQUssVUFBTCxHQUFrQixLQUFLLElBQUwsQ0FBVSxJQUFWLENBQWUsU0FBZixDQUFsQjtBQUNHLFFBQUssVUFBTCxDQUFnQixLQUFoQixDQUF1QixVQUFDLENBQUQsRUFBTztBQUM5QixNQUFFLGNBQUY7O0FBRUMsUUFBSSxRQUFRLGVBQUUsT0FBSyxVQUFMLENBQWdCLE9BQWhCLENBQXdCLGFBQTFCLENBQVo7O0FBRUEsUUFBSSxNQUFNLElBQU4sR0FBYSxRQUFiLENBQXNCLE1BQXRCLENBQUosRUFBbUM7QUFDL0IsV0FBTSxJQUFOLEdBQWEsV0FBYixDQUF5QixNQUF6QjtBQUNBLFdBQU0sSUFBTixHQUFhLE9BQWIsQ0FBcUIsR0FBckI7QUFDQSxXQUFNLE9BQU4sQ0FBYyxTQUFkLEdBQTBCLE1BQU0sT0FBTixDQUFjLFNBQWQsQ0FBd0IsT0FBeEIsQ0FBZ0MsVUFBaEMsRUFBNEMsRUFBNUMsQ0FBMUI7QUFDSCxLQUpELE1BSU87QUFDSCxXQUFNLE1BQU4sR0FBZSxNQUFmLEdBQXdCLElBQXhCLENBQTZCLFdBQTdCLEVBQTBDLFdBQTFDLENBQXNELE1BQXREO0FBQ0EsV0FBTSxNQUFOLEdBQWUsTUFBZixHQUF3QixJQUF4QixDQUE2QixXQUE3QixFQUEwQyxPQUExQyxDQUFrRCxHQUFsRDtBQUNBLFdBQU0sSUFBTixHQUFhLFdBQWIsQ0FBeUIsTUFBekI7QUFDQSxXQUFNLElBQU4sR0FBYSxXQUFiLENBQXlCLEdBQXpCO0FBQ0g7O0FBRUosV0FBSyxPQUFMLEdBQWUsZ0NBQXNCLEtBQXRCLENBQWY7QUFDQSxXQUFLLE9BQUwsQ0FBYSxJQUFiO0FBQ0EsSUFsQkU7QUFtQkg7Ozs7OztrQkFHYSxTOzs7Ozs7Ozs7OztBQ2xDZjs7QUFDQTs7Ozs7Ozs7Ozs7O0lBRU0saUI7OztBQUVMLDRCQUFZLElBQVosRUFBaUI7QUFBQTs7QUFBQSwrSEFDVixJQURVO0FBRWhCOzs7O3lCQUVLO0FBQ0wsT0FBSSxRQUFRLGVBQUUsSUFBRixDQUFaO0FBQ0EsT0FBSSxRQUFRLE1BQU0sR0FBTixFQUFXLElBQVgsQ0FBZ0IsT0FBNUI7QUFDQSxPQUFJLFdBQVcsZUFBRSxLQUFGLENBQWY7QUFDQSxXQUFRLEdBQVIsQ0FBWSx3QkFBd0IsTUFBTSxTQUExQzs7QUFFRyxPQUFJLFNBQVMsSUFBVCxHQUFnQixRQUFoQixDQUF5QixNQUF6QixLQUFvQyxNQUFNLFNBQU4sQ0FBZ0IsT0FBaEIsQ0FBd0IsUUFBeEIsS0FBcUMsQ0FBQyxDQUE5RSxFQUFpRjtBQUM3RSxVQUFNLFNBQU4sR0FBa0IsWUFBWSxNQUFNLFNBQXBDO0FBQ0gsSUFGRCxNQUVPO0FBQ0o7QUFDTCxVQUFNLFNBQU4sR0FBa0IsTUFBTSxTQUFOLENBQWdCLE9BQWhCLENBQXdCLFVBQXhCLEVBQW9DLEVBQXBDLENBQWxCO0FBQ0c7QUFDSjs7Ozs7O2tCQUdhLGlCOzs7Ozs7Ozs7OztJQ3ZCVCxNLEdBQ0YsZ0JBQVksSUFBWixFQUFrQjtBQUFBOztBQUNqQixTQUFLLElBQUwsR0FBWSxJQUFaO0FBQ0EsQzs7a0JBR1UsTTs7Ozs7QUNQZjs7QUFDQTs7Ozs7O0FBRUEsZUFBRSxRQUFGLEVBQVksS0FBWixDQUFtQixZQUFNOztBQUVyQixRQUFJLFlBQVksd0JBQWMsZUFBRSxNQUFGLENBQWQsQ0FBaEI7QUFDQSxjQUFVLElBQVY7QUFFSCxDQUxEOzs7Ozs7OztBQ0hBLElBQUksSUFBSSxPQUFPLE1BQWY7QUFDQSxJQUFJLFNBQVMsT0FBTyxNQUFwQjs7UUFFUSxDLEdBQUEsQztRQUFHLE0sR0FBQSxNIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24gZSh0LG4scil7ZnVuY3Rpb24gcyhvLHUpe2lmKCFuW29dKXtpZighdFtvXSl7dmFyIGE9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtpZighdSYmYSlyZXR1cm4gYShvLCEwKTtpZihpKXJldHVybiBpKG8sITApO3ZhciBmPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIrbytcIidcIik7dGhyb3cgZi5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGZ9dmFyIGw9bltvXT17ZXhwb3J0czp7fX07dFtvXVswXS5jYWxsKGwuZXhwb3J0cyxmdW5jdGlvbihlKXt2YXIgbj10W29dWzFdW2VdO3JldHVybiBzKG4/bjplKX0sbCxsLmV4cG9ydHMsZSx0LG4scil9cmV0dXJuIG5bb10uZXhwb3J0c312YXIgaT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2Zvcih2YXIgbz0wO288ci5sZW5ndGg7bysrKXMocltvXSk7cmV0dXJuIHN9KSIsImltcG9ydCB7JH0gZnJvbSAnLi9saWIvanF1ZXJ5LmVzNic7XHJcbmltcG9ydCBNb2R1bGUgZnJvbSAnLi9Nb2R1bGUuZXM2JztcclxuaW1wb3J0IEFjY29yZGlvbl9DaGFuZ2VyIGZyb20gJy4vQWNjb3JkaW9uX0NoYW5nZXIuZXM2JztcclxuXHJcbmNsYXNzIEFjY29yZGlvbiBleHRlbmRzIE1vZHVsZSB7XHJcblx0XHJcblx0Y29uc3RydWN0b3IoJGRvbSl7XHJcblx0XHRzdXBlcigkZG9tKTtcclxuXHR9XHJcblxyXG5cdGluaXQoKXtcclxuXHRcdHRoaXMudG9vZ2xlSXRlbSA9IHRoaXMuJGRvbS5maW5kKFwiLnRvZ2dsZVwiKTtcclxuXHQgICAgdGhpcy50b29nbGVJdGVtLmNsaWNrKCAoZSkgPT4ge1xyXG5cdFx0ICBcdGUucHJldmVudERlZmF1bHQoKTtcclxuXHJcblx0XHQgICAgdmFyICR0aGlzID0gJCh0aGlzLnRvb2dsZUl0ZW0uY29udGV4dC5hY3RpdmVFbGVtZW50KTtcclxuXHRcdCAgXHJcblx0XHQgICAgaWYgKCR0aGlzLm5leHQoKS5oYXNDbGFzcygnc2hvdycpKSB7XHJcblx0XHQgICAgICAgICR0aGlzLm5leHQoKS5yZW1vdmVDbGFzcygnc2hvdycpO1xyXG5cdFx0ICAgICAgICAkdGhpcy5uZXh0KCkuc2xpZGVVcCgzNTApO1xyXG5cdFx0ICAgICAgICAkdGhpcy5jb250ZXh0LmlubmVyVGV4dCA9ICR0aGlzLmNvbnRleHQuaW5uZXJUZXh0LnJlcGxhY2UoL0FjdGl2ZS9naSwgJycpO1xyXG5cdFx0ICAgIH0gZWxzZSB7XHJcblx0XHQgICAgICAgICR0aGlzLnBhcmVudCgpLnBhcmVudCgpLmZpbmQoJ2xpIC5pbm5lcicpLnJlbW92ZUNsYXNzKCdzaG93Jyk7XHJcblx0XHQgICAgICAgICR0aGlzLnBhcmVudCgpLnBhcmVudCgpLmZpbmQoJ2xpIC5pbm5lcicpLnNsaWRlVXAoMzUwKTtcclxuXHRcdCAgICAgICAgJHRoaXMubmV4dCgpLnRvZ2dsZUNsYXNzKCdzaG93Jyk7XHJcblx0XHQgICAgICAgICR0aGlzLm5leHQoKS5zbGlkZVRvZ2dsZSgzNTApO1xyXG5cdFx0ICAgIH1cclxuXHJcblx0XHRcdHRoaXMuY2hhbmdlciA9IG5ldyBBY2NvcmRpb25fQ2hhbmdlcigkdGhpcyk7XHJcblx0XHRcdHRoaXMuY2hhbmdlci5pbml0KCk7XHJcblx0XHR9KTtcclxuXHR9XHJcbn1cclxuXHJcbmV4cG9ydCBkZWZhdWx0IEFjY29yZGlvbjsiLCJpbXBvcnQgeyR9IGZyb20gJy4vbGliL2pxdWVyeS5lczYnO1xyXG5pbXBvcnQgTW9kdWxlIGZyb20gJy4vTW9kdWxlLmVzNic7XHJcblxyXG5jbGFzcyBBY2NvcmRpb25fQ2hhbmdlciBleHRlbmRzIE1vZHVsZSB7XHJcblx0XHJcblx0Y29uc3RydWN0b3IoJGRvbSl7XHJcblx0XHRzdXBlcigkZG9tKTtcclxuXHR9XHJcblxyXG5cdGluaXQoKXtcclxuXHRcdHZhciAkdGhpcyA9ICQodGhpcyk7XHJcblx0XHR2YXIgJGVsZW0gPSAkdGhpc1snMCddLiRkb20uY29udGV4dDtcclxuXHRcdHZhciAkZWxlbWVudCA9ICQoJGVsZW0pO1xyXG5cdFx0Y29uc29sZS5sb2coJ1lvdSBjbGlja2VkIG9uIHRoZSAnICsgJGVsZW0uaW5uZXJUZXh0KTtcclxuXHJcblx0ICAgIGlmICgkZWxlbWVudC5uZXh0KCkuaGFzQ2xhc3MoJ3Nob3cnKSAmJiAkZWxlbS5pbm5lclRleHQuaW5kZXhPZignQWN0aXZlJykgPT0gLTEpIHtcclxuXHQgICAgICAgICRlbGVtLmlubmVyVGV4dCA9ICdBY3RpdmUgJyArICRlbGVtLmlubmVyVGV4dDtcclxuXHQgICAgfSBlbHNlIHtcclxuICBcdCAgICBcdC8vY29uc29sZS5sb2coJGVsZW0ucGFyZW50KCkuc2libGluZ3MoKS5maW5kKCdhJykuaW5uZXJUZXh0KTtcclxuXHRcdFx0JGVsZW0uaW5uZXJUZXh0ID0gJGVsZW0uaW5uZXJUZXh0LnJlcGxhY2UoL0FjdGl2ZS9naSwgJycpO1xyXG5cdCAgICB9XHJcblx0fVxyXG59XHJcblxyXG5leHBvcnQgZGVmYXVsdCBBY2NvcmRpb25fQ2hhbmdlcjsiLCJcclxuY2xhc3MgTW9kdWxlIHtcclxuICAgIGNvbnN0cnVjdG9yKCRkb20pIHtcclxuXHQgICAgdGhpcy4kZG9tID0gJGRvbTtcclxuICAgIH1cclxufVxyXG5cclxuZXhwb3J0IGRlZmF1bHQgTW9kdWxlOyIsImltcG9ydCB7JH0gZnJvbSAnLi9saWIvanF1ZXJ5LmVzNic7XHJcbmltcG9ydCBBY2NvcmRpb24gZnJvbSAnLi9BY2NvcmRpb24uZXM2JztcclxuXHJcbiQoZG9jdW1lbnQpLnJlYWR5KCAoKSA9PiB7XHJcblxyXG4gICAgbGV0IGFjY29yZGlvbiA9IG5ldyBBY2NvcmRpb24oJCgnYm9keScpKTtcclxuICAgIGFjY29yZGlvbi5pbml0KCk7XHJcblxyXG59KTsiLCJsZXQgJCA9IHdpbmRvdy5qUXVlcnk7XHJcbmxldCBqUXVlcnkgPSB3aW5kb3cualF1ZXJ5O1xyXG5cclxuZXhwb3J0IHskLCBqUXVlcnl9OyJdfQ==
