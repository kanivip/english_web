
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

    var dataQuestionTable = $('#question-index').DataTable();
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


    setInterval(function(){
        $('.questions').children().each(function(){
            var $row = dataTable.row(this).nodes().to$();
            console.log($row.addClass('selected'));
        });
    },500);


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
    
});
