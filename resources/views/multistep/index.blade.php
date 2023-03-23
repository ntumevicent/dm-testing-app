@extends('layouts.admin-master')

@section('title')
View Bill Category
@endsection

@section('content')
<section class="section">
   <!-- <h1></h1>-->


  <div class="section-body">
    <div class="container">
        <div class="card">
            <div class="main active">
                <div class="top-div">
                    <div class="msg-img">
                        <img src="https://imgur.com/iyB9qOR.png">
                        <h3>Designgiri</h3>
                    </div>
                    <h2>Sign Up</h2>
                    <p>Basic Details</p>
                </div>
                <div class="input-text">
                    <input type="text" placeholder ="Username" require id="f_name">
                </div>
                <div class="input-text">
                    <input type="text" placeholder ="Email" require>
                </div>
                <div class="input-text"> 
                    <input type="password" placeholder ="Password" require>
                </div>
                <div class="input-text">
                    <input type="password" placeholder ="Confirm Password" require>
                </div>
                <div class="buttons">
                    <button class="next-btn">Next</button>
                </div>
            </div>
            <div class="main social">
                <div class="top-div">
                    <div class="msg-img">
                        <img src="https://imgur.com/iyB9qOR.png">
                        <h3>Designgiri</h3>
                    </div>
                    <h2>Sign Up</h2>
                    <p>Social Profiles</p>
                </div>
                <div class="input-text">
                    <input type="text" placeholder ="Enter your facebook url here.">
                    <i class="fa fa-facebook"></i>
                </div>
                <div class="input-text">
                    <input type="text" placeholder ="Enter your twitter url here.">
                    <i class="fa fa-twitter"></i>
                </div>
                <div class="input-text">
                    <input type="text" placeholder ="Enter your linkedin url here.">
                    <i class="fa fa-linkedin"></i>
                </div>
                <div class="input-text">
                    <input type="text" placeholder ="Enter your dribbble url here.">
                    <i class="fa fa-dribbble"></i>
                </div>
                <div class="buttons">
                    <button class="previous-btn">Previous</button>
                    <button class="next-btn">Next</button>
                    
                </div>
            </div>
            <div class="main">
                <div class="top-div">
                    <div class="msg-img">
                        <img src="https://imgur.com/iyB9qOR.png">
                        <h3>Designgiri</h3>
                    </div>
                    <h2>Sign Up</h2>
                    <p>Personal Details</p>
                </div>
                <div class="input-text">
                    <input type="text" placeholder="dd/mm/yyyy" data-slots="dmy" require >
                  
                </div>
                <div class="input-text">
                    <input type="text" placeholder ="Enter your nationality url here." require>
                   
                </div>
                <div class="input-text">
                     <select>
                         <option>Select Gender</option>
                         <option>Male</option>
                         <option>Female</option>
                         <option>Others</option>
                     </select>
                </div>
                <div class="input-text">
                    <input type="text" placeholder ="Enter your address url here.">
                    
                </div>
                <div class="buttons">
                    <button class="previous-btn">Previous</button>
                    <button class="submit-btn">Submit</button>
                    
                </div>
            </div>
            <div class="main">
                <div class="top-div">
                    <div class="msg-img">
                        <img src="https://imgur.com/iyB9qOR.png">
                        <h3>Designgiri</h3>
                    </div>
                </div>
                <div class="checkmark">
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
               </div>
               <p class="congratulations">Congratulations Mr./Mrs. <span id="s_name"></span> your details have been successfully added.</p>
            </div>
            
            
            <div class="sign-in">
                <p>Already have an account?<a href="#"> Sign in</a></p>
            </div>
        </div>
        
    </div>
  </div>
</section>
@endsection


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
*{
    margin:0;
    padding:0;
}
.container{
    min-height:100vh;
    background-color:#e3e9ee;
    display:flex;
    justify-content:center;
    align-items:center;
}
.main{
    height:425px;
    width:330px;
    background-color:#fff;
    border-radius:10px;
    padding:0 20px;
    box-sizing:border-box;
    font-family: 'Poppins', sans-serif;
}
.top-div{
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    
}
.msg-img{
    display:flex;
    justify-content:center;
    align-items:center;
    margin-top:20px;
    margin-bottom:10px;
}
.msg-img img{
    width:40px;
}
.msg-img h3{
    margin-left:5px;
}
.top-div p{
    font-size:12px;
    font-weight:700;
    margin-top:10px;
}
.top-div h2{
    color:#82848a;
}
.input-text{
    padding: 0 10px;
    margin:20px 0;
    position:relative;
}
input[type="text"]{
    width:100%;
    height:35px;
    border:none;
    background-color:#eef5ff;
    padding:0 20px;
    box-sizing:border-box;
    outline :none;
     border-radius:3px;
     border:1px solid #eef5ff;
     font-size:12px;
}


input[type="password"]{
    width:100%;
    height:35px;
    border:none;
    background-color:#eef5ff;
    padding:0 20px;
    box-sizing:border-box;
    outline :none;
    border:1px solid #eef5ff;
    border-radius:3px;
    font-size:12px;
}
.buttons{
    display:flex;
    justify-content:center;
    align-items:center;
    padding:0 10px;
    gap:20px;
}
.buttons button{
    height:35px;
    width:100%;
    border:none;
    outline:0;
    background-color:#e74d3d;
    color:#fff;
    font-size:12px;
     border-radius:3px;
     cursor:pointer;
    
}
.input-text i{
    position:absolute;
    top:13px;
    left:25px;
    color:#82848a;
    font-size:13px;
}
.input-text select{
     width:100%;
    height:35px;
    border:none;
    background-color:#eef5ff;
    padding:0 20px;
    box-sizing:border-box;
    outline :none;
     border-radius:3px;
     border:1px solid #eef5ff;
     font-size:12px;
}


.social input[type="text"]{
    padding-left:35px;
}









.main{
    display:none;
}
.active{
    display:block !important;
}

.sign-in{
    display:flex;
    justify-content:center;
    margin-top:10px;
    font-size:12px;
    font-family: 'Poppins', sans-serif;
    font-weight:600;

}
.sign-in p{
    color:#8593a6;
}
.sign-in a{
    text-decoration:none;
    color:#b65e55;
}

.warning{
    border:1px solid red !important;
}


.checkmark{
    display:flex;
    justify-content:center;
    align-items:center;
 
}
Since you are using a css file, you will need to convert the scss to css.

Here's a demo:

.checkmark__circle {
  stroke-dasharray: 166;
  stroke-dashoffset: 166;
  stroke-width: 2;
  stroke-miterlimit: 10;
  stroke: #7ac142;
  fill: none;
  animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

.checkmark {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  display: block;
  stroke-width: 2;
  stroke: #fff;
  stroke-miterlimit: 10;
  margin: 10% auto;
  box-shadow: inset 0px 0px 0px #7ac142;
  animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
}

.checkmark__check {
  transform-origin: 50% 50%;
  stroke-dasharray: 48;
  stroke-dashoffset: 48;
  animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}
.congratulations{
    font-size:12px;
    font-weight:700;
    padding:0 10px;
} 


@keyframes stroke {
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes scale {
  0%, 100% {
    transform: none;
  }
  50% {
    transform: scale3d(1.1, 1.1, 1);
  }
}
@keyframes fill {
  100% {
    box-shadow: inset 0px 0px 0px 30px #7ac142;
  }
}
</style>

<script>
    var next_click=document.querySelectorAll(".next-btn");
var previous_click=document.querySelectorAll(".previous-btn");
var submit_click=document.querySelector(".submit-btn");
var main_click=document.querySelectorAll(".main");
let forumnum=0;
next_click.forEach(function(btn){
btn.addEventListener('click',function(){
    if(!validate_form()){
        return false;
    }
    forumnum++; 
    updateform();
});

});

previous_click.forEach(function(butn){
    butn.addEventListener('click',function(){
        forumnum--;
        updateform();
    });
}); 

submit_click.addEventListener('click',function(){
    if(!validate_form()) return false;
    var f_name = document.getElementById("f_name"); 
var s_name = document.getElementById("s_name");
      s_name.innerHTML = f_name.value;
      forumnum++; 
      
    updateform(); 
    
});


 

function updateform(){
    main_click.forEach(function(forms){
        forms.classList.remove('active');
    });
    main_click[forumnum].classList.add('active');
}

function validate_form(){

var validate=true;
var inputs= document.querySelectorAll(".main.active input");
inputs.forEach(function(inpt){
inpt.classList.remove('warning');
if(inpt.hasAttribute("require")){
if(inpt.value.length==0){
validate=false;
inpt.classList.add('warning');
}
}

});

return validate;

}


document.addEventListener('DOMContentLoaded', () => {
for (const el of document.querySelectorAll("[placeholder][data-slots]")) {
const pattern = el.getAttribute("placeholder"),
slots = new Set(el.dataset.slots || "_"),
prev = (j => Array.from(pattern, (c,i) => slots.has(c)? j=i+1: j))(0),
first = [...pattern].findIndex(c => slots.has(c)),
accept = new RegExp(el.dataset.accept || "\\d", "g"),
clean = input => {
input = input.match(accept) || [];
return Array.from(pattern, c =>
input[0] === c || slots.has(c) ? input.shift() || c : c
);
},
format = () => {
const [i, j] = [el.selectionStart, el.selectionEnd].map(i => {
i = clean(el.value.slice(0, i)).findIndex(c => slots.has(c));
return i<0? prev[prev.length-1]: back? prev[i-1] || first: i; }); el.value=clean(el.value).join``; el.setSelectionRange(i, j); back=false; }; let back=false; el.addEventListener("keydown", (e)=> back = e.key === "Backspace");
    el.addEventListener("input", format);
    el.addEventListener("focus", format);
    el.addEventListener("blur", () => el.value === pattern && (el.value=""));
    }
    });
</script>
