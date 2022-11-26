<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/assets/admin/js/script.js')}}"></script>
<script src="{{asset('/assets/admin/lib/chart/chart.min.js')}}"></script>
<script src="{{asset('/assets/admin/lib/easing/easing.min.j')}}s"></script>
<script src="{{asset('/assets/admin/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('/assets/admin/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('/assets/admin/lib/tempusdominus/js/moment.min.js')}}"></script>
<script src="{{asset('/assets/admin/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
<script src="{{asset('/assets/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('/assets/admin/js/main.js')}}"></script>


<script>
    // show hide change password
    $(".show_change_pass").click(function(){
        $(".show_change_pass").hide();
        $(".change_pass").show();
        Validator({
        form: '#edit-user',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#name', 'Họ tên không được để trống!'),
            Validator.isEmail('#email'),
            Validator.isRequired('#password'),
            Validator.minLength('#password', 6),
            Validator.isRequired('#re_password'),
            Validator.isConfirmed('#re_password', function() {
                return document.querySelector('#edit-user #password').value;
            }, 'Mật khẩu nhập lại không chính xác')
            ],
        });
    });

    $(".hide_change_pass").click(function(){
        // location.reload();
        $(".show_change_pass").show();
        $(".change_pass").hide();
        Validator({
        form: '#edit-user',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#name', 'Họ tên không được để trống!'),
            Validator.isEmail('#email'),
            // Validator.isRequired('#password'),
            // Validator.minLength('#password', 6),
            // Validator.isRequired('#re_password'),
            // Validator.isConfirmed('#re_password', function() {
            //     return document.querySelector('#edit-user #password').value;
            // }, 'Mật khẩu nhập lại không chính xác')
            ],
        });

    });
    //thông báo xóa sản phẩm
    function del(name) {
        return confirm('Bạn có chắc chắn muốn xóa: ' + name + '?');
    }

    //load ảnh 
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

    //
    Validator({
        form: '#add-user',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#name', 'Họ tên không được để trống!'),
            Validator.isEmail('#email'),
            Validator.minLength('#password', 6),
            Validator.isRequired('#re_password'),
            Validator.isConfirmed('#re_password', function() {
                return document.querySelector('#add-user #password').value;
            }, 'Mật khẩu nhập lại không chính xác')
        ],
    });

    if($('.change_pass').css("display") == 'none' ){
        Validator({
        form: '#edit-user',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#name', 'Họ tên không được để trống!'),
            Validator.isEmail('#email'),
            // Validator.isRequired('#password'),
            // Validator.minLength('#password', 6),
            // Validator.isRequired('#re_password'),
            // Validator.isConfirmed('#re_password', function() {
            //     return document.querySelector('#edit-user #password').value;
            // }, 'Mật khẩu nhập lại không chính xác')
            ],
        });
    }

    // if($('.change_pass').css("display") == 'block' ){
        
    // }
    
    
    //add-category
    Validator({
        form: '#add-cate',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#cate_name', 'Tên danh mục không được để trống!'),
            Validator.isRequired('input[name="show_menu"]', 'Hãy chọn 1 mục!'),
        ],
    });

    //edit-category
    Validator({
        form: '#edit-cate',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#cate_name', 'Tên danh mục không được để trống!'),
        ],
    });

    //add-product
    Validator({
        form: '#add-prd',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#name', 'Tên sản phẩm không được để trống!'),
            Validator.isRequired('#price', 'Giá bán không được để trống!'),
            Validator.isRequired('#cate_id', 'Chọn 1 danh mục!'),
            Validator.isRequired('#image', 'Hãy chọn 1 hình ảnh!'),
            Validator.isRequired('input[name="star"]', 'Hãy chọn 1 mục!'),
        ],
    });

    //add-product
    Validator({
        form: '#edit-prd',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#name', 'Tên sản phẩm không được để trống!'),
            Validator.isRequired('#price', 'Giá bán không được để trống!'),
        ],
    });

    

</script>
