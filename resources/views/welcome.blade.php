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
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h5 class="mb-0"><i class="fas fa-tasks me-2"></i>Task List</h5>
                    </div>

                    <div class="col">
                        <h6 class="mb-0"><image style="width: 30px;height: 30px;border-radius: 15px;" src="{{$image}}"></i>Hello, {{$name}} <span><a href='logout'>Logout</a></span></h6>
                    </div>
                    
                </div>
               
              </div>
          <div class="card-body p-5">

            <form class="d-flex justify-content-center align-items-center mb-4" method="post" action="/">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="form-outline flex-fill">
                <input type="text" required id="form2" name="task_name" class="form-control" />
                <label class="form-label" for="form2">New task...</label>
              </div>
              <button type="submit" class="btn btn-info ms-2">Add</button>
            </form>

            <!-- Tabs navs -->
            <ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab"
                  aria-controls="ex1-tabs-1" aria-selected="true">All</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab"
                  aria-controls="ex1-tabs-2" aria-selected="false">Active</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3" role="tab"
                  aria-controls="ex1-tabs-3" aria-selected="false">Completed</a>
              </li>
            </ul>
            <!-- Tabs navs -->
            
            
            
            <!-- Tabs content -->
            <div class="tab-content" id="ex1-content">
              <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                aria-labelledby="ex1-tab-1">

                <ul class="list-group mb-0">

                    @foreach($all_tasks as $task)
                  <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                    style="background-color: #f4f6f7;">
                    <form action="/update_status" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @if($task->status=='active')
                        <input class="form-check-input me-2" onclick="submit()" type="checkbox" value="" aria-label="..." />

                    @else
                    <input class="form-check-input me-2" onclick="submit()" type="checkbox" checked value="" aria-label="..." />

                    @endif
                        <input hidden name="id" value="{{$task->id}}">
                        <input hidden name="status" value="{{$task->status}}">
                        <button hidden id="updateBtn" type="submit">SUBMIT</button>
                       
                    </form>
                   
                    @if($task->status=='active')
                    {{$task->task_name}}
                    @else
                    <s>{{$task->task_name}}</s>
                    @endif
                  </li>
                  @endforeach
                  
                
                </ul>
              </div>

              <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                <ul class="list-group mb-0">

                    @foreach($active_tasks as $task)
                    <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                      style="background-color: #f4f6f7;">
                      <form action="/update_status" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                          @if($task->status=='active')
                          <input class="form-check-input me-2" onclick="submit()" type="checkbox" value="" aria-label="..." />
  
                      @else
                      <input class="form-check-input me-2" onclick="submit()" type="checkbox" checked value="" aria-label="..." />
  
                      @endif
                          <input hidden name="id" value="{{$task->id}}">
                          <input hidden name="status" value="{{$task->status}}">
                          <button hidden id="updateBtn" type="submit">SUBMIT</button>
                         
                      </form>
                     
                      @if($task->status=='active')
                      {{$task->task_name}}
                      @else
                      <s>{{$task->task_name}}</s>
                      @endif
                    </li>
                    @endforeach
                </ul>
              </div>
              <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                <ul class="list-group mb-0">
                 
                    @foreach($completed_tasks as $task)
                  <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                    style="background-color: #f4f6f7;">
                    <form action="/update_status" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @if($task->status=='active')
                        <input class="form-check-input me-2" onclick="submit()" type="checkbox" value="" aria-label="..." />

                    @else
                    <input class="form-check-input me-2" onclick="submit()" type="checkbox" checked value="" aria-label="..." />

                    @endif
                        <input hidden name="id" value="{{$task->id}}">
                        <input hidden name="status" value="{{$task->status}}">
                        <button hidden id="updateBtn" type="submit">SUBMIT</button>
                       
                    </form>
                   
                    @if($task->status=='active')
                    {{$task->task_name}}
                    @else
                    <s>{{$task->task_name}}</s>
                    @endif
                  </li>
                  @endforeach
                 
                </ul>
              </div>
            </div>
            <!-- Tabs content -->

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