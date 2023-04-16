const newForumBtns = document.querySelectorAll('.newForum');
const cacher = document.querySelector('.cacher');
const ajoutBtn = document.querySelector('.ajout');

window.addEventListener('load', () => {
    newForumBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
			document.getElementsByClassName("cacher")[0].style.visibility = "visible";
        })
    })
    ajoutBtn.addEventListener('submit',(event)=>{
		ajoutField.forEach( (field) => {
                document.getElementsByClassName("cacher")[0].style.visibility = "hidden";
        });
		
    })
	
})
$(document).ready(() => {
	clickNext();
	question3();
})


function question1() {
}

function question2() {
}

function question3() {
  const lastColor = $("item").css("background-color");
  $("list").append("<div>Couleur précédente :"+ lastColor+ "</div>");
  $("item").css({
  backgroundColor: "#4691FF",
  border : "5px solid white"
  });
}
function changePage() {
	window.location.href = "forum1.php?";
}
function clickNext() {
$("item").on("click ", function(event){
		document.cookie = 'sujet='+this.dataset.name;
		window.location ='forum1.php';
	});
}
