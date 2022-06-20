import '@fortawesome/fontawesome-free/js/all.min.js';
import './bootstrap';
import 'animate.css';
import Swal from 'sweetalert2/dist/sweetalert2.js'
import ScrollReveal from 'scrollreveal'


ScrollReveal().reveal('.headline',{
    distance : "30px",
    origin : "top",
    duration : 20,
    interval : 50
});

ScrollReveal().reveal('.detail',{
    distance : "30px",
    origin : "top",
    duration : 1000,
    interval : 200
});


// Alert ....................

document.getElementById('logout').addEventListener('click',(event) => {

    Swal.fire({
        title: 'Are you sure to leave?',
        text: "If you logout you need to login again",
        icon: 'question',
        showCancelButton: true,
        color:'#FFEE63',
        background:'#7858A6',
        confirmButtonColor: '#4cbb17',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes !'
    }).then((result) => {
        if (result.isConfirmed) {
            event.preventDefault();
            document.getElementById('logout-form').submit();

        }
    });

});

// Delete Post ......................
let trash = document.querySelectorAll('#delete');

for(let i=0; i<trash.length; i++){
       trash[i].addEventListener('click', (event) => {
               event.preventDefault();
               Swal.fire({
                   title: 'Are you sure to delete this post?',
                   text: "If you delete you can't undo this post !",
                   icon: 'question',
                   showCancelButton: true,
                   color: '#FFEE63',
                   background: '#7858A6',
                   confirmButtonColor: '#7858A6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Yes !'
               }).then((result) => {
                   if (result.isConfirmed) {
                       document.getElementById('deleteSubmit').submit();
                   }

               });
       })
    }
// Successful SweetAlert............
    let alertSuccess = document.getElementById('alertSuccess')

    if(alertSuccess){
        let alertText = alertSuccess.textContent
        let Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            background:'#4cbb17',
            color:'white',
            padding:10,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title:alertText,
        })
    }
















