import {$} from './lib/jquery.es6';
import Module from './Module.es6';

class Accordion_Changer extends Module {
	
	constructor($dom){
		super($dom);
	}

	init(){
		var $this = $(this);
		var $elem = $this['0'].$dom.context;
		var $element = $($elem);
		console.log('You clicked on the ' + $elem.innerText);

	    if ($element.next().hasClass('show') && $elem.innerText.indexOf('Active') == -1) {
	        $elem.innerText = 'Active ' + $elem.innerText;
	    } else {
  	    	//console.log($elem.parent().siblings().find('a').innerText);
			$elem.innerText = $elem.innerText.replace(/Active/gi, '');
	    }
	}
}

export default Accordion_Changer;