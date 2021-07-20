<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./frontend/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="/frontend/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script src="./frontend/js/jquery.min.js"></script>
    <script src="./frontend/js/bootstrap.min.js"></script>
    <script src="./frontend/js/axios.min.js"></script>
    <script src="./frontend/js/vue.min.js"></script>
    <script src="./frontend/js/socket.io.min.js"></script>
    <title>Document</title>
</head>
<body>
   
    <div id="app" class="container">
        <h3 class="text-center">Messaging</h3>
        <div class="messaging">
              <div class="inbox_msg">
                <div class="inbox_people">
                  <div class="headind_srch">
                    <div class="recent_heading">
                      <h4>Thành viên</h4>
                    </div>
                  </div>
                  <div class="inbox_chat">
                      @foreach ($user as $item)
                        <div class="chat_list active_chat">
                            <div class="chat_people">
                            <div class="chat_img"> <img src="/image/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                                <h5>{{$item->name}}<span class="chat_date">Dec 25</span></h5>
                                <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                            </div>
                        </div>
                      @endforeach
                  </div>
                </div>
                <div class="mesgs">
                  <div class="msg_history">
                    <div class="incoming_msg">
                      <div class="incoming_msg_img"> <img src="/image/user-profile.png" alt="sunil"> </div>
                      <div class="received_msg">
                        <div class="received_withd_msg">
                          <p>Test which is a new approach to have all
                            solutions</p>
                          <span class="time_date"> 11:01 AM    |    June 9</span></div>
                      </div>
                    </div>
                    <div class="outgoing_msg">
                      <div class="sent_msg">
                        <p>Test which is a new approach to have all
                          solutions</p>
                        <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                    </div>
                    <div class="incoming_msg">
                      <div class="incoming_msg_img"> <img src="/image/user-profile.png" alt="sunil"> </div>
                      <div class="received_msg">
                        <div class="received_withd_msg">
                          <p>Test, which is a new approach to have</p>
                          <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
                      </div>
                    </div>
                    <div class="outgoing_msg">
                      <div class="sent_msg">
                        <p>Apollo University, Delhi, India Test</p>
                        <span class="time_date"> 11:01 AM    |    Today</span> </div>
                    </div>
                    <div class="incoming_msg">
                      <div class="incoming_msg_img"> <img src="/image/user-profile.png" alt="sunil"> </div>
                      <div class="received_msg">
                        <div class="received_withd_msg">
                          <p>We work directly with our designers and suppliers,
                            and sell direct to you, which means quality, exclusive
                            products, at a price anyone can afford.</p>
                          <span class="time_date"> 11:01 AM    |    Today</span></div>
                      </div>
                    </div>
                  </div>
                  <div class="type_msg">
                    <div class="input_msg_write">
                      <input @keyup.enter="sendMessage" v-model="message" type="text" class="write_msg" placeholder="Type a message" />
                      <button @click="sendMessage" class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
        </div>
        <div>
            <a href="{{ route('logout') }}">
                Đăng xuất
            </a>
        </div>
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
        <script>
            new Vue({
                el: "#app",
                data(){
                    return {
                        message: ""
                    }
                },
                methods: {
                    sendMessage(){
                        axios.post('/message',{message:this.message})
                        this.message="";
                    }
                },
                mounted() {
                    const echo = new Echo({
                        broadcaster: "socket.io"
                    })
                    echo.join('chat').here(function(users){
                        console.log(users)
                    });
                },
            })
        </script>
</body>
</html>