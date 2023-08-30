

/**EDITOR  */

try {
    var newCKEdit = CKEDITOR.replace("description", {
        height: "600px",
    });
    CKEDITOR.config.allowedContent = true;
  
    CKFinder.config({ connectorPath: "/ckfinder/connector" });
    CKFinder.setupCKEditor(newCKEdit, "/");

} catch (e) {
    console.log(e);
    console.log("no iniciado sdsds");
}



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



    $(".btn-add-option").on('click',function(e){
        e.preventDefault();
       let htm = '';

       let items = $(".icheck").length;

        htm =  `<div class="form-row">
                    <div class="form-group  col-md-9">
                        <label for="option${items+1}" class="control-label">Option</label>
                        <input type="text" name="option[]" id="option${items+1}" class="form-control ">
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-check form__pad">
                            <div class="option${items+1} icheck "></div>
                            <input type="hidden" class="inputoption" name="result[]" value="">
                        </div>
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