<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
rel="stylesheet"
/>
</head>
<style>
    .gradient-custom {
  background: radial-gradient(50% 123.47% at 50% 50%, #00ff94 0%, #720059 100%),
    linear-gradient(121.28deg, #669600 0%, #ff0000 100%),
    linear-gradient(360deg, #0029ff 0%, #8fff00 100%),
    radial-gradient(100% 164.72% at 100% 100%, #6100ff 0%, #00ff57 100%),
    radial-gradient(100% 148.07% at 0% 0%, #fff500 0%, #51d500 100%);
  background-blend-mode: screen, color-dodge, overlay, difference, normal;
}
</style>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Sign Up</h3>
                  <form action="register" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row">
                      <div class="col-md-6 mb-4">
      
                        <div class="form-outline">
                          <input type="text" required id="firstName" name="firstName" class="form-control form-control-lg" />
                          <label class="form-label"  for="firstName">First Name</label>
                        </div>
      
                      </div>
                      <div class="col-md-6 mb-4">
      
                        <div class="form-outline">
                          <input type="text" required id="lastName" name="lastName" class="form-control form-control-lg" />
                          <label class="form-label" for="lastName">Last Name</label>
                        </div>
      
                      </div>
                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4 d-flex align-items-center">
      
                        <div class="form-outline">
                            <input type="email" name="email" required id="email" class="form-control form-control-lg" />
                            <label class="form-label" for="email">Email</label>
                          </div>
      
                      </div>
                      <div class="col-md-6 mb-4 d-flex align-items-center">
      
                        <div class="form-outline">
                            <input type="password" name="password" required id="password" class="form-control form-control-lg" />
                            <label class="form-label" for="password">Password</label>
                          </div>
      
                      </div>
                    </div>
      
                    <div class="col-md-12 mb-4">

                        <h6 class="mb-2 pb-1">Potrait: </h6>
      
                       
                        <div class="form-outline">
                            <input required name="image" type="file" id="image" class="form-control form-control-lg" />
                          
                          </div>
      
                        
      
                      </div>


                    <div class="mt-4 pt-2">
                      <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                    </div>
                    <p class="text text-muted mt-5 mb-0">Already have an account? <a href="/login"
                        class="fw-bold text-body"><u>Login here</u></a></p>
      
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>

<script>
    function submit(){
        document.getElementById("updateBtn").click()
    }
</script>

</html>