/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Search
4. Init Menu
5. Init Language Slider
6. Init Timer


******************************/

$(document).ready(function()
{
	"use strict";

	/* 

	1. Vars and Inits

	*/

	var menu = $('.menu');
	var header = $('.header');
	var menuActive = false;
	var burger = $('.hamburger');

	setHeader();

	$(window).on('resize', function()
	{
		setHeader();
	});

	$(document).on('scroll', function()
	{
		setHeader();
	});

	initSearch();
	initMenu();
	initLang();
	initTimer();

	/* 

	2. Set Header

	*/

	function setHeader()
	{
		if($(window).scrollTop() > 100)
		{
			header.addClass('scrolled');
		}
		else
		{
			header.removeClass('scrolled');
		}
	}

	/* 

	3. Init Search

	*/

	function initSearch()
	{
		if($('.search_button').length)
		{
			var search = $('.search_button');
			search.on('click', function()
			{
				$('.search_form_container').toggleClass('active');
			});	
		}
	}

	/* 

	4. Init Menu

	*/

	function initMenu()
	{
		if($('.menu').length)
		{
			var menu = $('.menu');
			if($('.hamburger').length)
			{
				burger.on('click', function()
				{
					if(menuActive)
					{
						closeMenu();
					}
					else
					{
						openMenu();

						$(document).one('click', function cls(e)
						{
							if($(e.target).hasClass('menu_mm'))
							{
								$(document).one('click', cls);
							}
							else
							{
								closeMenu();
							}
						});
					}
				});
			}
		}
	}

	function openMenu()
	{
		menu.addClass('active');
		menuActive = true;
	}

	function closeMenu()
	{
		menu.removeClass('active');
		menuActive = false;
	}

	/* 

	5. Init Language Slider

	*/

	function initLang()
	{
		if($('.language_slider').length)
		{
			var langSlider = $('.language_slider');
			langSlider.owlCarousel(
			{
				loop:true,
				autoplay:false,
				smartSpeed:1200,
				nav:false,
				dots:false,
				responsive:
				{
					0:{items:2},
					480:{items:4},
					720:{items:6},
					990:{items:9}
				}
			});

			if($('.lang_prev').length)
			{
				var prev = $('.lang_prev');
				prev.on('click', function()
				{
					langSlider.trigger('prev.owl.carousel');
				});
			}

			if($('.lang_next').length)
			{
				var next = $('.lang_next');
				next.on('click', function()
				{
					langSlider.trigger('next.owl.carousel');
				});
			}
		}
	}

	/* 

	6. Init Timer

	*/

	function initTimer()
	{
		if($('.timer_list').length)
    	{
    		// Uncomment line below and replace date
	    	// var target_date = new Date("April 7, 2018").getTime();

	    	// comment lines below
	    	var date = new Date();
	    	date.setDate(date.getDate() + 21);
	    	var target_date = date.getTime();
	    	//----------------------------------------
	 
			// variables for time units
			var days, hours, minutes, seconds;

			var d = $('#day');
			var h = $('#hour');
			var m = $('#minute');
			var s = $('#second');

			setInterval(function ()
			{
			    // find the amount of "seconds" between now and target
			    var current_date = new Date().getTime();
			    var seconds_left = (target_date - current_date) / 1000;
			 
			    // do some time calculations
			    days = parseInt(seconds_left / 86400);
			    seconds_left = seconds_left % 86400;
			     
			    hours = parseInt(seconds_left / 3600);
			    seconds_left = seconds_left % 3600;
			     
			    minutes = parseInt(seconds_left / 60);
			    seconds = parseInt(seconds_left % 60);

			    // display result
			    d.text(days);
			    h.text(hours);
			    m.text(minutes);
			    s.text(seconds); 
			 
			}, 1000);
    	}	
	}




});
//CUSTOM CODE

	//click to pronounce
	$('.btn-pronounce').on('click',function (){
		// Initialize new SpeechSynthesisUtterance object
		let speech = new SpeechSynthesisUtterance();
		// Set Speech Language
		speech.lang = "en";
		var button = $(this).parent();
		button = $(button).parent();
		button = $(button).find('.td-name').text();
		console.log(button);
		speech.text = button;
		window.speechSynthesis.speak(speech);
	});

	//search field vocabulary
	document.getElementById("inputVocabulary").addEventListener("keyup", function(){
		var datalist = document.getElementById('datalistVocabulary')
		var question = document.getElementById('question')
		$.ajax({
            type: 'GET',
            url: '/vocabulary/searchVocabulary',
            data: {key:this.value},
            dataType: 'json',
            success: function (data) {
				var dataoption = '';
				data.forEach(function(currentValue, index){
					dataoption += '<option value="'+currentValue.id+'">'+currentValue.name+'</option>'
				});
				datalist.innerHTML = dataoption;
            },
        });
		$.ajax({
            type: 'GET',
            url: '/vocabulary/searchVocabularyById',
            data: {id:this.value},
            dataType: 'json',
            success: function (data) {
				question.value = data[0].name;
            },
        });
		question.value = this.text();
	});
	// show form add to adminquestions
	
	setInterval(function(){
		var answerA = document.getElementById('answer_a');
		var answerB = document.getElementById('answer_b');
		var answerC = document.getElementById('answer_c');
		var answerD = document.getElementById('answer_d');
		var correctAnswer = document.getElementById('correctAnswer');
		var multipleChoice = document.getElementById('multiple-choice');
		var autoCreate = document.getElementById('checkbox-auto');
		autoCreate.style.display = "none";
		correctAnswer.style.display = "none";
		switch(document.getElementById("selectCategory").value) {
			case "1":
				multipleChoice.style.display = "block";
				autoCreate.style.display = "none";
				correctAnswer.style.display = "none";
			  break;
			case "2":
				multipleChoice.style.display = "none";
				autoCreate.style.display = "block";
				correctAnswer.style.display = "block";
			  break;
			case "3":
				multipleChoice.style.display = "none";
				autoCreate.style.display = "none";
				correctAnswer.style.display = "none";
			  break;
			case "4":
				multipleChoice.style.display = "none";
				autoCreate.style.display = "none";
				correctAnswer.style.display = "none";
			  break;
			case "5":
				multipleChoice.style.display = "none";
				autoCreate.style.display = "block";
				correctAnswer.style.display = "block";
			  break;
		  }
	}, 500);

	var formMutiple = document.getElementById("multiple-choice");
	document.getElementById("selectCategory").addEventListener("change",function() {

		
	});

	//END CUSTOM