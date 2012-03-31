/*********************************************************************
*	On DOM Load - Put all js code and functions inside this function
*	- This is also called a "self-executing anonymous function"
* 	  it helps avoid polluting the global namespace with your 
* 	  code — no variables declared inside of the function are 
* 	  visible outside of it
**********************************************************************/
(function($, window, document, undefined){
	/*********************************************************************
	*	On Window Load:
	*	Put functions that need invoked after the Page is done loading
	**********************************************************************/
	$(window).load(function(){
		
	});
	
	/*********************************************************************
	*	On Window Resize:
	*	Put functions that need invoked if the browser window is resized
	**********************************************************************/
	$(window).resize(function(){
		
	});
	
	
	/*******************************************************************
	*	Sample Function Comment
	*		- Just showing function structure
	*		- If the function has parameters, please list and explain
	*		  what the parameters are for. NOTE: Params and Param
	*		  explanations are examples only
	*	Params:
	*		@param1 - string - should be the 
	*		@param2 - boolean - heading soughtstreet
	*	
	*	Function Example:
	* 	function sampleFunction(param1, param2){
	*		// This is just a sample of a function setup
	*	}
	*******************************************************************/
})(jQuery, this, document);