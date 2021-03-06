$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

var token = $('meta[name="csrf-token"]').attr('content');

document.addEventListener("DOMContentLoaded", function(event) {

    //click to pronounce
    $('.btn-pronounce').on('click', function() {
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
    if (inputVocabulary) {
        inputVocabulary.addEventListener("keyup", function() {
            var datalist = document.getElementById('datalistVocabulary')
            var question = document.getElementById('question')
            $.ajax({
                type: 'GET',
                url: '/vocabulary/searchVocabulary',
                data: { key: this.value },
                dataType: 'json',
                success: function(data) {
                    var dataoption = '';
                    data.forEach(function(currentValue, index) {
                        dataoption += '<option value="' + currentValue.id + '">' + currentValue.name + '</option>'
                    });
                    datalist.innerHTML = dataoption;
                },
            });
            $.ajax({
                type: 'GET',
                url: '/vocabulary/searchVocabularyById',
                data: { id: this.value },
                dataType: 'json',
                success: function(data) {
                    question.value = data[0].name;
                },
            });
            question.value = this.text();
        });
    }
    if ($('#question-index').length) {
        var dataQuestionTable = $('#question-index').DataTable();
    }
    if ($('#demo123').length) {
        var dataTable = $('#demo123').DataTable();
        $('#demo123 tbody').on('click', 'tr', function() {
            $(this).toggleClass('selected');
            console.log(dataTable.rows('.selected').data().length + ' row(s) selected');
            var questionsInput = '';
            var ids = $.map(dataTable.rows('.selected').data(), function(item) {
                return item[0]
            });
            ids.forEach(element => {
                questionsInput += '<input name="questions[]" value="' + element + '" type="number"/>';
            });
            $('.questions').html(questionsInput);

        });

        var arr = [];
        $('.questions').children().each(function() {
            arr.push($(this).val());
            console.log(arr);
        });
        dataTable.rows().every(function(rowIdx, tableLoop, rowLoop) {
            arr.forEach(element => {
                if (this.data()[0] == element) {
                    $(this.node()).addClass('selected');
                }
            });

        });
    }

    $('.btn-modalQuestion').on('click', function() {
        $.ajax({
            type: 'POST',
            url: '/questions/getQuestionsByLesson',
            data: { id: this.value },
            dataType: 'json',
            success: function(data) {
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
    function showImage(src, target) {
        var fr = new FileReader();
        // when image is loaded, set the src of the image where you want to display it
        fr.onload = function(e) { target.src = this.result; };
        src.addEventListener("change", function() {
            // fill fr with image data    
            fr.readAsDataURL(src.files[0]);
        });
    }

    var src = document.getElementById("image-src");
    var target = document.getElementById("image-target");
    if (src && target) { showImage(src, target); }

    //load more ajax lessons
    if($('#load_more_lesson').length){
        var page = $('#load_more_lesson').data('value');
        $('#load_more_lesson').on('click',function(){
            page++;
            $.ajax({
                type: 'GET',
                url: 'loadMore?page=' + page,
                data: {},
                dataType: 'json',
                success: function (data) {
                    if(data.view == '')
                    {
                        $('#load_more_lesson').hide();
                    }
                    $('.courses_row').append(data.view);
                },
            });
        });
    }
    // check coin user for learn
    if($('.learnLesson').length){
            $(document).on("click", '.learnLesson', function(event) { 
                let id = $(this).data('value');
                let thread = $(this).parents('.course').find('.course_title').children().text();
                let price = $(this).parents('.course').find('.learnLesson').children().text();
                $('.modal-title').text('Lesson:'+thread);
                price = price.trim();
                if(price == 'Learned')
                {
                    $('.modal-body').text('You want to revise');
                }else{
                $('.modal-body').text('You will be lost '+price+' coin');
                }
                $('#btn-learn').data('learn',id);
                $('#learnModal').modal('show');    
            });
            $(document).on("click", '#btn-learn', function(event) { 
                let lesson_id = $(this).data('learn');
                $.ajax({
                    type: 'GET',
                    url: '/lessons/checkcoinlesson',
                    data: {id:lesson_id},
                    dataType: 'json',
                    success: function (data) {
                        if(data.flag == true)
                        {
                            window.location.href = data.message;
                        }else if(data.flag == 'no user'){
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
    //process study lesson
    if ($('#answer').length) {
        function shuffle(array) {
            var currentIndex = array.length,
                randomIndex;

            // While there remain elements to shuffle...
            while (0 !== currentIndex) {

                // Pick a remaining element...
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex--;

                // And swap it with the current element.
                [array[currentIndex], array[randomIndex]] = [
                    array[randomIndex], array[currentIndex]
                ];
            }

            return array;
        }

        let answer = $('#answer').text().trim();
        let arrAnswer = shuffle(answer.split(" "));
        let contentAnswer = '';
        arrAnswer.forEach(element => {
            contentAnswer += '<button type="button" class="btn-word m-2 btn btn-outline-primary btn-sm">' + element + '</button>';
        });
        $('#answer').html(contentAnswer);


    }
    //study lesson
    if($('#lesson').length){
        $('#lesson').children().eq(0).show();

        $(document).on("click", '.btn-word', function(event) {
            if ($(this).parent().attr('id') == 'answer') {
                $('#yourAnswer').append($(this));
            } else if ($(this).parent().attr('id') == 'yourAnswer') {
                $('#answer').append($(this));
            }
        });


            	//click to pronounce page studying
                $(document).on("click", '#btn-pronounce', function(event) { 
                    // Initialize new SpeechSynthesisUtterance object
                    let speech = new SpeechSynthesisUtterance();
                    // Set Speech Language
                    speech.lang = "en";
                    let word = $(this).data('value');
                    console.log(word);
                    speech.text = word;
                    window.speechSynthesis.speak(speech);
                });
            
                    $(document).on("click", '#btn-pronounce-low', function(event) { 
                    // Initialize new SpeechSynthesisUtterance object
                    let speech = new SpeechSynthesisUtterance();
                    speech.rate = "0.4";
                    // Set Speech Language
                    speech.lang = "en";
            
                    let word = $(this).data('value');
                    console.log(word);
                    speech.text = word;
                    window.speechSynthesis.speak(speech);
                });
            

        $(document).on("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.key === 'Enter') {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("checkQuestion").click();

            }
        });

        //call ajax for get question and process study lesson
        $(document).on("click", '#checkQuestion', function(event) {

            let lesson_id = $('#lesson').data('value');
            let question_id = $('#question').data('value');
            let category = $('#category').data('value')
            var yourAnswer = '';
            switch (category) {
                case 1:
                    yourAnswer = $("#category input[type='radio']:checked").val();
                    break;
                case 2:
                  $('#yourAnswer').children().each(function(){
                    yourAnswer = yourAnswer+" "+$(this).text();
                  });
                  yourAnswer = yourAnswer.trim();
                  break;
                case 3:
                    $('#yourAnswer').children().each(function(){
                        yourAnswer = yourAnswer+" "+$(this).text();
                      });
                      yourAnswer = yourAnswer.trim();
                      break;
                case 5:
                        yourAnswer = $('#yourAnswerText').val();
                        yourAnswer = yourAnswer.trim();
                        console.log($('#yourAnswerText'));
                    break;
                default:
                    // code block
            }
            $.ajax({
                type: 'GET',
                url: '/questions/getAndCheckQuestion',
                data: { lesson_id: lesson_id, question_id: question_id, answer: yourAnswer },
                dataType: 'json',
                success: function(data) {
                    $('#lesson').html(data.view);
                    

                    console.log(data[0].questionNow);
                    if (data[0].message == true) {
                        $('#message-question').text('Congratulations. Your answer is correct')
                    } else if (data[0].message == 'finish') {
                        $('#message-question').text('Congratulations. You finsih this lesson. Keep up')
                        window.setTimeout(function() {
                            window.location.href = data[0].url;
                        }, 3000);
                    } else {
                        $('#message-question').html('Opp. Your answer is incorrect </br> Correct answer is: ' + data[0].questionNow.answer)
                    }
                    $('#messageQuestion').modal('show');
                    // shuffle answer
                    if ($('#answer').length) {
                        function shuffle(array) {
                            var currentIndex = array.length,
                                randomIndex;

                            // While there remain elements to shuffle...
                            while (0 !== currentIndex) {

                                // Pick a remaining element...
                                randomIndex = Math.floor(Math.random() * currentIndex);
                                currentIndex--;

                                // And swap it with the current element.
                                [array[currentIndex], array[randomIndex]] = [
                                    array[randomIndex], array[currentIndex]
                                ];
                            }

                            return array;
                        }

                        let answer = $('#answer').text().trim();
                        let arrAnswer = shuffle(answer.split(" "));
                        let contentAnswer = '';
                        arrAnswer.forEach(element => {
                            contentAnswer += '<button type="button" class="btn-word m-2 btn btn-outline-primary btn-sm">' + element + '</button>';
                        });
                        $('#answer').html(contentAnswer);
                    }
                    //process bar
                    console.log(data[0].process);
                    let process = data[0].process + '%';
                    $("#process-bar").text(process)
                    $("#process-bar").css("width", process);


                },
            });

            
        });
    }

    //revise lesson
    if($('#revise').length){
        $('#revise').children().eq(0).show();
        
        $(document).on("click", '.btn-word', function(event) {
            if($(this).parent().attr('id')=='answer')
            {
                $('#yourAnswer').append($(this));
            }else if($(this).parent().attr('id')=='yourAnswer')
            {
                $('#answer').append($(this));
            }
        });


            	//click to pronounce page studying
        $(document).on("click", '#btn-pronounce', function(event) { 
		// Initialize new SpeechSynthesisUtterance object
        let speech = new SpeechSynthesisUtterance();
		// Set Speech Language
		speech.lang = "en";
        let word = $(this).data('value');
        console.log(word);
		speech.text = word;
		window.speechSynthesis.speak(speech);
	});

        $(document).on("click", '#btn-pronounce-low', function(event) { 
		// Initialize new SpeechSynthesisUtterance object
        let speech = new SpeechSynthesisUtterance();
        speech.rate = "0.4";
		// Set Speech Language
		speech.lang = "en";

        let word = $(this).data('value');
        console.log(word);
		speech.text = word;
		window.speechSynthesis.speak(speech);
	});

        $(document).on("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.key === 'Enter') {
              // Cancel the default action, if needed
              event.preventDefault();
              // Trigger the button element with a click
              document.getElementById("checkQuestion").click();
                
            }
          });

        //call ajax for get question and process study lesson
        $(document).on("click", '#checkQuestion', function(event) { 

            let question_id = $('#question').data('value');
            let category = $('#category').data('value')
            var yourAnswer = '';
            console.log('category' +category);
            switch(category) {
                case 1:
                    yourAnswer = $("#category input[type='radio']:checked").val();
                  break;
                case 2:
                  $('#yourAnswer').children().each(function(){
                    yourAnswer = yourAnswer+" "+$(this).text();
                  });
                  yourAnswer = yourAnswer.trim();
                  break;
                case 3:
                    $('#yourAnswer').children().each(function(){
                        yourAnswer = yourAnswer+" "+$(this).text();
                      });
                      yourAnswer = yourAnswer.trim();
                      break;
                case 5:
                        yourAnswer = $('#yourAnswerText').val();
                        yourAnswer = yourAnswer.trim();
                        console.log($('#yourAnswerText'));
                    break;
                default:
                  // code block
              }
              $.ajax({
                type: 'GET',
                url: '/questions/getAndCheckQuestionRevise',
                data: {question_id:question_id,answer:yourAnswer},
                dataType: 'json',
                success: function (data) {
                    $('#revise').html(data.view);
                    
                    console.log(data[0].message);
                    console.log(data);
                    if(data[0].message == true)
                    {
                        $('#message-question').text('Congratulations. Your answer is correct')
                    }
                    else if(data[0].message == 'finish'){
                        $('#message-question').text('Congratulations. You finsih this lesson. Keep up')
                        window.setTimeout(function(){
                            window.location.href = data[0].url;
                        }, 3000);
                    }
                    else{
                        $('#message-question').html('Opp. Your answer is incorrect </br> Correct answer is: '+ data[0].questionNow.answer)
                    }
                    $('#messageQuestion').modal('show');
                // shuffle answer
                if($('#answer').length)
                {
                    function shuffle(array) {
                        var currentIndex = array.length,  randomIndex;
                    
                        // While there remain elements to shuffle...
                        while (0 !== currentIndex) {
                    
                        // Pick a remaining element...
                        randomIndex = Math.floor(Math.random() * currentIndex);
                        currentIndex--;
                    
                        // And swap it with the current element.
                        [array[currentIndex], array[randomIndex]] = [
                            array[randomIndex], array[currentIndex]];
                        }
                    
                        return array;
                    }
            
                    let answer = $('#answer').text().trim();
                    let arrAnswer = shuffle(answer.split(" "));
                    let contentAnswer = '';
                    arrAnswer.forEach(element => {
                        contentAnswer +='<button type="button" class="btn-word m-2 btn btn-outline-primary btn-sm">'+element+'</button>';
                    });
                    $('#answer').html(contentAnswer);
                }
                //process bar
                    
                    let process = data[0].process+'%';
                    $("#process-bar").text(process)
                    $("#process-bar").css("width", process);
                
                
                },
            });

            
        });



    }
    $('.spinner-border').hide();
    //add comment lesson
    if($('#comment-add').length){
        /* $("#comment-update").removeClass("d-flex").addClass("d-none");
        //click show and hide
        $("#btn-comment-update").on('click',function(){
            if($("#comment-update").hasClass("d-none"))
            {
            $("#comment-update").removeClass("d-none").addClass("d-flex");
            }else{
                $("#comment-update").removeClass("d-flex").addClass("d-none");
            }
        }) */
        //click add to comment
        $('#comment-add').on('click',function(){
            let lesson_id = $('.learnLesson').data('value');
            let content = $('#comment-input').val();
            
            $.ajax({
                type: "POST",
                url: '/lessons/addComment',
                data: {_token:token,lesson_id:lesson_id,content:content},
                dataType: 'json',
                beforeSend: function(){
                    $('.spinner-border').show();
                },
                complete: function(){
                    $('.spinner-border').hide();
                },
                success: function (data) {
                    
                    $.ajax({
                        type: "Get",
                        url: '/lessons/loadMoreComment',
                        data: {_token:token,lesson_id:lesson_id,skip:0},
                        dataType: 'json',
                        success: function (data) {
                            $("#comments").html(data.view);
                        },
                    })
                    if(data == 'update'){
                        $('#your-comment').find('.comment-text-sm').children().text(content)
                        $('#your-comment').find('.datetime').text('Updated')
                        }else{
                            $.ajax({
                                type: "Get",
                                url: '/lessons/loadUserComment',
                                data: {_token:token,lesson_id:lesson_id,skip:0},
                                dataType: 'json',
                                success: function (data) {
                                    $('#your-comment').html(data.view);
                                },
                            })
                        }
                },
            })

        })
        $(document).on('click','#comment-remove',function(){
            let lesson_id = $('.learnLesson').data('value');
            let content = $('#comment-input').val();
            $.ajax({
                type: "DELETE",
                url: '/lessons/removeComment',
                beforeSend:function(){
                    return confirm("Are you sure delete your comment?");
                },
                data: {_token:token,lesson_id:lesson_id,content:content},
                dataType: 'json',
                success: function (data) {
                    $('#your-comment').empty();
                    $.ajax({
                        type: "Get",
                        url: '/lessons/loadMoreComment',
                        data: {_token:token,lesson_id:lesson_id,skip:0},
                        dataType: 'json',
                        success: function (data) {
                            $("#comments").html(data.view);
                        },
                    })
                },
            })

        })
        var skip = 5;
        $('#load_more_comment').on('click',function(){
            let lesson_id = $('.learnLesson').data('value');
            $.ajax({
                type: "Get",
                url: '/lessons/loadMoreComment',
                data: {_token:token,lesson_id:lesson_id,skip:skip},
                dataType: 'json',
                success: function (data) {
                    skip+=5;
                    $("#comment-main").append(data.view);
                    if(data.view == ''){
                        $("#load_more_comment").hide();
                    }
                },
            })

        })
    }

    //chart

    //chart for new users.
    if($('#chart-user').length){ 
        $.ajax({
            type: 'GET',
            url: '/api/users/getDataResultMonth',
            dataType: 'json',
            success: function (data) {
                let arrMonth = [];
                let arrDataTotalUser = ["new user"];
                let yearNow = new Date().getFullYear();
                data.forEach(element => {
                    if(yearNow==element.year){
                    arrMonth.push(element.month+"-"+element.year);
                    arrDataTotalUser.push(element.total_month);
                    }
                });
                
                var chartUser = c3.generate({
                    bindto: '#chart-user',
                    data: {
                      columns: [
                        arrDataTotalUser,
                      ],
                    },
                    axis: {
                        x: {
                            type: 'category',
                            categories: arrMonth,
                        }
                    }
                });
            },
        });

        $('#select-chart-user').on('change',function(){
            let year = $('#select-chart-user').val();
            $.ajax({
                type: 'GET',
                url: '/api/users/getDataResultMonth',
                dataType: 'json',
                success: function (data) {
                    let arrMonth = [];
                    let arrDataTotalUser = ["new user"];
                    data.forEach(element => {
                        if(year==element.year){
                        arrMonth.push(element.month+"-"+element.year);
                        arrDataTotalUser.push(element.total_month);
                        }
                    });
                    
                    var chartUser = c3.generate({
                        bindto: '#chart-user',
                        data: {
                          columns: [
                            arrDataTotalUser,
                          ],
                        },
                        axis: {
                            x: {
                                type: 'category',
                                categories: arrMonth,
                            }
                        }
                    });
                },
            });
        })

    }   
    //end chart
})
