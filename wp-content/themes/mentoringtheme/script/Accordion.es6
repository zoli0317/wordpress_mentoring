import {$} from './lib/jquery.es6';
import Module from './Module.es6';
import Accordion_Changer from './Accordion_Changer.es6';

class Accordion extends Module {
	
	constructor($dom){
		super($dom);
	}

	init(){
		this.toogleItem = this.$dom.find(".toggle");
	    this.toogleItem.click( (e) => {
		  	e.preventDefault();

		    var $this = $(this.toogleItem.context.activeElement);
		  
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

			this.changer = new Accordion_Changer($this);
			this.changer.init();
		});
	}
}

export default Accordion;