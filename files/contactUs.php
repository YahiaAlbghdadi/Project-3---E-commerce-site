<?php
  require_once "../compos/userNavbar.php";  

?>
<style>

.contact-parent{
    background: #fff;
    display:flex;
    margin:80px 0;
}
.contact-child{
    display:flex;
    flex:1;
    box-shadow:0px 0px 10px -2px rgba(0,0,0,0.75);
}
.child1{
    background:linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url("https://cdn.pixabay.com/photo/2018/05/01/13/04/miniature-3365503__340.jpg");
    background-size:cover;
    display:flex;
    flex-direction:column;
    justify-content:space-around;
    color:#fff;
    padding:100px 0;
}
.child1 p{
    padding-left:20%;
    font-size:20px;
    text-shadow:0px 0px 2px #000;
}
.child1 p span{
    font-size:16px;
    color:#9df2fd;
}
.child2{
    flex-direction:column;
    justify-content:space-around;
    align-items:center;
}
.inside-contact{
    width:90%;
    margin:0 auto;
}
.inside-contact h2{
    text-transform:uppercase;
    text-align:center;
    margin-top:50px;
}
.inside-contact h3{
    text-align:center;
    font-size:16px;
    color:#0085e2;
}
.inside-contact input, .inside-contact textarea{
    width:100%;
    background-color:#eee;
    border:1px solid rgba(0,0,0,0.48);
    padding:5px 10px;
    margin-bottom:20px;
}
.inside-contact input[type=submit]{
    background-color:#1D3557;
    color:#fff;
    transition:0.2s;
    border:2px solid #000;
    margin:30px 0;
}
.inside-contact input[type=submit]:hover{
    background-color:#fff;
    color:#000;
    transition:0.2s;
}
@media screen and (max-width:991px){
    .contact-parent{
        display:block;
        width:100%;
    }
    .child1{
        display:none;
    }
    .child2{
        background-image:linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.7)), url("https://cdn.pixabay.com/photo/2019/06/28/00/17/architecture-4303279_1280.jpg");
        background-size:cover;
    }
    .inside-contact input, .inside-contact textarea{
        background-color:#fff;
    }
}

</style>

<!-- <div class="container"> -->
   <div class="contact-parent">
      <div class="contact-child child1">
         <p>
            <i class="fas fa-map-marker-alt"></i> Address <br />
            <span> Austria
            <br />
           Vianna, 1050
            </span>
         </p>
         <p>
            <i class="fas fa-phone-alt"></i> Let's Talk <br />
            <span> 0787878787</span>
         </p>
         <p>
            <i class=" far fa-envelope"></i> General Support <br />
            <span>contact@example.com</span>
         </p>
      </div>
      <div class="contact-child child2">
         <div class="inside-contact">
            <h2>Contact Us</h2>
            <h3>
               <span id="confirm">
               <form action="https://formsubmit.co/ahmadtktk44@gmail.com" method="POST">
            </h3>
            <p>Name *</p>
            <input id="txt_name" type="text"  placeholder="name " name="name" Required="required">
            <p>Email *</p>
            <input id="txt_email" type="email" Required="required"  placeholder="Email Address " name="email ">
            <!-- <input type="hidden" name="_next " value="https://ahmad.codefactory.live/thank.html"> -->
            <p>Phone *</p>
            <input id="txt_phone" type="number" Required="required" placeholder="phone " name="phone ">
            <p>Subject *</p>
            <input id="txt_subject" type="text" Required="required"  placeholder="subject " name="_subject ">
            <p>Message *</p>
            <textarea id="txt_message" rows="4" cols="20" Required="required" placeholder="Write your message here.. "  name="message "></textarea>
            <input type="submit" id="btn_send" value="SEND">
         </div>
      </div>
   </div>
</div>







