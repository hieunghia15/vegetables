<div class="nk-footer">
    <div class="container-fluid">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright"> &copy; 2022 Vegetables Ecommerce store <a href="#" target="_blank">Nope</a>
            </div>
            <div class="nk-footer-links">
                <ul class="nav nav-sm">
                    <li class="nav-item"><a class="nav-link" href="#">Điều khoản và dịch vụ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Chính sách bảo mật</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Hỗ trợ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
<script>
    function ChangeToSlug()
{
var slug;

//Lấy text từ thẻ input title
slug = document.getElementById("slug").value;

//Đổi chữ hoa thành chữ thường
slug = slug.toLowerCase();

//Đổi ký tự có dấu thành không dấu
slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
slug = slug.replace(/đ/gi, 'd');
//Xóa các ký tự đặt biệt
slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
//Đổi khoảng trắng thành ký tự gạch ngang
slug = slug.replace(/ /gi, "-");
//Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
//Phòng trường hợp người nhập vào quá nhiều ký tự trắng
slug = slug.replace(/\-\-\-\-\-/gi, '-');
slug = slug.replace(/\-\-\-\-/gi, '-');
slug = slug.replace(/\-\-\-/gi, '-');
slug = slug.replace(/\-\-/gi, '-');
//Xóa các ký tự gạch ngang ở đầu và cuối
slug = '@' + slug + '@';
slug = slug.replace(/\@\-|\-\@|\@/gi, '');
//In slug ra textbox có id “slug”
document.getElementById('convert_slug').value = slug;
}
</script>