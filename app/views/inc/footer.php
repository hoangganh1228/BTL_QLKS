  <!-- footer -->
  <div class="container-fluid bg-white mt-5">
      <div class="row">
          <div class="col-lg-4 p-4">
              <h3 class="h-font fw-bold fs-3 mb-2">Khách sạn</h3>
              <p>Chúng tôi cam kết mang đến sự thoải mái và hài lòng tối đa với các phòng nghỉ tinh tế, tiện nghi cao
                  cấp như giường êm ái, TV màn hình phẳng, Internet tốc độ cao và phòng tắm hiện đại. Quý Khách còn có
                  thể tận hưởng hồ bơi, phòng gym, spa, nhà hàng ẩm thực phong phú và phòng hội nghị chuyên nghiệp.</p>
          </div>
          <div class="col-lg-4 p-4">
              <h5 class="mb-3">Đường dẫn</h5>
              <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Trang chủ</a><br>
              <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Phòng</a><br>
              <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Dịch vụ</a><br>
              <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Liên hệ</a><br>

          </div>
          <div class="col-lg-4 p-4">
              <h5 class="mb-3 ">Theo dõi chúng tôi</h5>
              <a href="#" class="d-inline-block mb-3 text-dark text-decoration-none ">
                  <i class="bi bi-twitter me-1"></i>Twitter

              </a><br>
              <a href="#" class="d-inline-block mb-3 text-dark text-decoration-none ">
                  <i class="bi bi-facebook me-1"></i>Facebook

              </a><br>
              <a href="#" class="d-inline-block mb-3 text-dark text-decoration-none ">
                  <i class="bi bi-instagram me-1"></i>Instagram
              </a><br>
          </div>
      </div>
  </div>



  <script>
let register_form = document.getElementById('register-form');
register_form.addEventListener('submit', (e) => {
    e.preventDefault();
    let data = new FormData();
    data.append('name', register_form.elements['name'].value);
    data.append('email', register_form.elements['email'].value);
    data.append('phonenum', register_form.elements['phonenum'].value);
    data.append('address', register_form.elements['address'].value);
    data.append('pincode', register_form.elements['pincode'].value);
    data.append('dob', register_form.elements['dob'].value);
    data.append('pass', register_form.elements['pass'].value);
    data.append('cpass', register_form.elements['cpass'].value);
    data.append('profile', register_form.elements['profile'].files[0]);
    data.append('register', '');

    var myModal = document.getElementById('registerModal');
    var modal = bootstrap.Modal.getInstance(myModal)
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/login_register.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('room-data').innerHTML = this.responseText;
    }
    xhr.send(data);
})
  </script>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>