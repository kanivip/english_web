

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



document.addEventListener("DOMContentLoaded", function (event) {

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
    var inputVocabulary = document.getElementById("inputVocabulary");
    if(inputVocabulary){
        inputVocabulary.addEventListener("keyup", function(){
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
    }
    if( $('#question-index').length){
        var dataQuestionTable = $('#question-index').DataTable();
    }
    if( $('#demo123').length){
        var dataTable = $('#demo123').DataTable();
        $('#demo123 tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('selected');
            console.log( dataTable.rows('.selected').data().length +' row(s) selected' );
            var questionsInput = '';
            var ids = $.map(dataTable.rows('.selected').data(), function (item) {
                return item[0]
            });
            ids.forEach(element => {
                questionsInput += '<input name="questions[]" value="'+element+'" type="number"/>';
            });
            $('.questions').html(questionsInput);

        });
        
        var arr = [];
        $('.questions').children().each(function () {
            arr.push($(this).val());
            console.log(arr);
        });
        dataTable.rows().every(function (rowIdx, tableLoop, rowLoop) {
            arr.forEach(element => {
                if (this.data()[0] == element) {
                    $(this.node()).addClass('selected');
                }
            });

        });
    }

    $('.btn-modalQuestion').on('click',function(){
        $.ajax({
            type: 'POST',
            url: '/questions/getQuestionsByLesson',
            data: {id:this.value},
            dataType: 'json',
            success: function (data) {
                $('#tableQuestion-show').html(data.view)
                $('#modal-questions').modal('show')
            },
        });
        
    });







	//show name image
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	  });

	//show image
	function showImage(src,target) {
		var fr=new FileReader();
		// when image is loaded, set the src of the image where you want to display it
		fr.onload = function(e) { target.src = this.result; };
		src.addEventListener("change",function() {
		  // fill fr with image data    
		  fr.readAsDataURL(src.files[0]);
		});
	  }

	  var src = document.getElementById("image-src");
	  var target = document.getElementById("image-target");
	  if(src&&target){showImage(src,target);}

    //load more ajax lessons
    if($('.load_more_button').length){
        var page = $('.load_more_button').data('value');
        $('.load_more_button').on('click',function(){
            page++;
            $.ajax({
                type: 'GET',
                url: 'loadMore?page='+page,
                data: {},
                dataType: 'json',
                success: function (data) {
                    if(data.view == '')
                    {
                        $('.load_more_button').hide();
                    }
                    $('.courses_row').append(data.view);
                },
            });
        });
    }
    
    if($('.learnLesson').length){
            $(document).on("click", '.learnLesson', function(event) { 
                let id = $(this).data('value');
                let thread = $(this).parents('.course').find('.course_title').children().text();
                let price = $(this).parents('.course').find('.learnLesson').children().text();
                $('.modal-title').text('Lesson:'+thread);
                $('.modal-body').text('You will be lost '+price+' coin');
                $('#btn-learn').data('learn',id);
                $('#learnModal').modal('show');    
            });
            $(document).on("click", '#btn-learn', function(event) { 
                let lesson_id = $(this).data('learn');
                $.ajax({
                    type: 'GET',
                    url: './checkcoinlesson',
                    data: {id:lesson_id},
                    dataType: 'json',
                    success: function (data) {
                        if(data.flag == true)
                        {
                            window.location.href = data.message;
                        }else
                        {
                            $('.modal-body').text(data.message);
                            $('#learnModal').modal('show');  
                        }
                    },
                });
            });

    }

});
