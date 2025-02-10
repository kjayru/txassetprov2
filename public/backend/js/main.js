

/**EDITOR  */

// try {
//     var newCKEdit = CKEDITOR.replace("description", {
//         height: "600px",
//     });
//     CKEDITOR.config.allowedContent = true;

//     CKFinder.config({ connectorPath: "/ckfinder/connector" });
//     CKFinder.setupCKEditor(newCKEdit, "/");

//     newCKEdit.on( 'required', function( evt ) {
//       editor.showNotification( 'This field is required.', 'warning' );
//       evt.cancel();
//   } );

// } catch (e) {
//     console.log(e);
//     console.log("no iniciado sdsds");
// }



$(function() {

    console.log("cargadde libreria");

    $('.product-image-thumb').on('click', function() {
      const image_element = $(this).find('img');
      $('.product-image').prop('src', $(image_element).attr('src'))
      $('.product-image-thumb.active').removeClass('active');
      $(this).addClass('active');
    });


      $(".btn-object-delete").on("click", function(){
          let id = $(this).data('id');
          $(".delete-objeto input[name='id']").val(id);
      });

      $(".btn-mod").on("click",function(e){
        e.preventDefault();


          $(this).parent('div').parent('div').children(".thumbnail").hide();
          $(this).parent('div').parent('div').children("input[type='file']").show();
      });

      $(".thumbnail").css("cursor","pointer");



    $(document).on('click',".btn-add-option",function(e){
        e.preventDefault();
       let htm = '';

       let items = $(".check__respuesta").length;

        htm =  `<div class="form-row">
                    <div class="form-group  col-md-9">
                        <label for="option${items+1}" class="control-label">Option</label>
                        <input type="text" name="option[]" id="option${items+1}" class="form-control " required>
                    </div>

                    <div class="form-check col-md-3">
                    <input type="radio" name="result" id="result${items+1}" class="form-check form-check-inline check__respuesta" value="${items+1}">
                    <label class="form-check-label" for="result${items+1}">Result</label>
                </div>
                </div>`;

                $(".card-question").append(htm);
        });



    $(document).on("click",".icheck",function(){
        $('.icheck').removeClass("icheck__active");

        $(this).addClass("icheck__active");
        $(".inputoption").val(0);
        $(this).parent().children('.inputoption').val(1);

    });
  })


$(".btn__getcourses").on('click',function(e){

    let id= $(this).data('id');
    let exam_id = $(this).data('examid');

    e.preventDefault();
    $.ajax({
      url:'/admin/get-exam',
      type:'GET',
      dataType:'json',
      success:function(response){
        htm='';
        htm+=`<option value=""> Selected</option>`;
        $.each(response,function(i,e){
            htm+=`<option value="${e.id}" ${exam_id==e.id?'selected':''}> ${e.title}</option>`;
        })

        $("#course-selector").html(htm);
        $("#course_id").val(id);
      }
    });
});



$("#frm-question").validate({
    rules: {
        "option[]": {required: true},
        "result[]": {required: true},

      },
      messages: {
        "option[]": "Debe escoger un sector obligatoriamente.",
        "result[]": "marque una respuesta."
      },
});

$(".btn__detail").on('click', function(e) {
    e.preventDefault();
    let userid = $(this).data("userid");
    let examid = $(this).data("examid");

    $.ajax({
        url: `/result-exam/${examid}/${userid}`,
        type: 'GET',
        success: function(response) {
            let htm = "";
            console.log(response);

            $.each(response, function(i, e) {
                htm += `<div class="question"><div class="question-title">${e.question}</div>`;
                $.each(e.options, function(x, y) {
                    if (y.correct_answer === 1 && y.user_answer === 1) {
                        htm += `<div class="option selected">${y.opcion}</div>`;
                    } else if (y.correct_answer === 1 && y.user_answer === null) {
                        htm += `<div class="option selectedcorrect">${y.opcion}</div>`;
                    } else if (y.correct_answer === 0 && y.user_answer === 1) {
                        htm += `<div class="option not-selected">${y.opcion}</div>`;
                    } else {
                        htm += `<div class="option">${y.opcion}</div>`;
                    }
                });
                htm += `</div>`;
            });
            $(".exam__result").html(htm);
        }
    });
});
