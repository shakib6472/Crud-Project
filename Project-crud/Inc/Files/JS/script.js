document.addEventListener("DOMContentLoaded", function(){
    console.log("Hello");
})

const deleteButton  = document.querySelectorAll(".delete");

for (let i = 0; i < deleteButton.length; i++) {
    deleteButton[i].addEventListener("click", function(e){
        if(!confirm("Are You sure to Delete")){
            e.preventDefault();
        } 
    })
}