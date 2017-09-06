 <div class="titre-div">
        <div>
            <a href="/language">
            <img src="./img/logo.jpg" class="logo" /> 
            </a>
        </div>
        <div class="titre">
            <div>
                <h1 class="title has-text-centered">Entre terre et ciel</h1>
                <h2 class="subtitle has-text-centered" id="ss-titre">Entre la France et L'Inde<br/>Entre une selle de vélo et des rencontres</h2>
            </div>
        </div>
    </div>
<div class="container">
<div class="tile is-ancestor">
  <!-- All other tile elemnts -->
  <div class="tile is-parent is-vertical">
    <div class="tile is-child box carre_accueil">
      <p class="title center"><a href="/equipe">L'équipe</a></p>
    </div>
    <div class="tile is-child box carre_accueil">
      <p class="title center">Nous nous engageaons auprès de</p>
      <a href="esperancebanlieu">Espérance Banlieue </a> <br/>
      <a href="fraterniteenirak">Fraternité en Irak </a> <br/>
      <a href="soeurdelacharite">Soeur de la Charité </a>
    </div>
    <div class="tile is-child box carre_accueil">
      <p class="title center"><a href="/contact">Contact</a></p>
    </div>
  </div>
  
  <div class="tile is-parent is-vertical">
    <div class="tile is-child box carre_accueil">
      <p class="title center"><a href="aide">Nous aider</a></p>
    </div>
    <div class="tile is-child box carre_accueil">
      <p class="title center"><a href="projet">Projet</a></p>
    </div>
    <div class="tile is-child box carre_accueil">
      <p class="title center"><a href="itineraire">Itinéraire</a></p>
    </div>
  </div>
 <div class="tile is-parent">
    <div class="tile is-child box carre_accueil">
      <p class="title center"><a href="carnet">Carnet de voyage</a></p>
    </div>
  </div>
</div>

<!-- Slider avec le texte qui défile-->




<div id="carousel">
    <div id="slides">
    <ul>
      <li class="slide">
        <div class="quoteContainer">
          <p class="quote-phrase"><span class="quote-marks">"</span> Ayez le courage d’être heureux <span class="quote-marks">"</span> </p>
        </div>
        <div class="authorContainer">
          <p class="quote-author">Pape françois aux jeunes des JMJ</p>
        </div>
      </li>
      <li class="slide">
        <div class="quoteContainer">
          <p class="quote-phrase"><span class="quote-marks">"</span> On ne peut être heureux qu’en laissant pleinement notre personnalité s’exprimer <span class="quote-marks">"</span> </p>
        </div>
        <div class="authorContainer">
          <p class="quote-author">Pape françois aux jeunes des JMJ</p>
        </div>
      </li>
      <li class="slide">
        <div class="quoteContainer">
          <p class="quote-phrase"><span class="quote-marks">"</span>Nous nous retrouvons étourdis et abrutis tandis que d’autres (…) décident de l’avenir pour nous<span class="quote-marks">"</span> </p>
        </div>
        <div class="authorContainer">
          <p class="quote-author">Pape françois aux jeunes des JMJ</p>
        </div>
      </li>
      <li class="slide">
        <div class="quoteContainer">
          <p class="quote-phrase"><span class="quote-marks">"</span>Vivre sans foi n’est pas vivre mais vivoter, il ne faut jamais vivoter<span class="quote-marks">"</span> </p>
        </div>
        <div class="authorContainer">
          <p class="quote-author">Giorgio Frassati</p>
        </div>
      </li>
      <li class="slide">
        <div class="quoteContainer">
          <p class="quote-phrase"><span class="quote-marks">"</span>L’homme le plus heureux, c’est celui qui fait le bonheur d’un plus grand nombre d’autres<span class="quote-marks">"</span> </p>
        </div>
        <div class="authorContainer">
          <p class="quote-author">père Zanotti</p>
        </div>
      </li>
      <li class="slide">
        <div class="quoteContainer">
          <p class="quote-phrase"><span class="quote-marks">"</span>Grâce à l’amour, l’acte le plus banal de, notre vie peut devenir le plus sublime<span class="quote-marks">"</span> </p>
        </div>
        <div class="authorContainer">
          <p class="quote-author">père Zanotti</p>
        </div>
      </li>
      <li class="slide">
        <div class="quoteContainer">
          <p class="quote-phrase"><span class="quote-marks">"</span>Notre drame à nous est que nous avons souvent peur d’un bonheur trop simple<span class="quote-marks">"</span> </p>
        </div>
        <div class="authorContainer">
          <p class="quote-author">père Zanotti</p>
        </div>
      </li>
      <li class="slide">
        <div class="quoteContainer">
          <p class="quote-phrase"><span class="quote-marks">"</span>Faire suinter la joie du présent<span class="quote-marks">"</span> </p>
        </div>
        <div class="authorContainer">
          <p class="quote-author">père Zanotti</p>
        </div>
      </li>
    </ul>
  </div>
  <div class="btn-bar">
    <div id="buttons"><a id="prev" href="#"><</a><a id="next" href="#">></a> </div>
  </div>
</div>
</div>

<script>
// script pour le slider
$(document).ready(function () {
    //rotation speed and timer
    var speed = 5000;
    
    var run = setInterval(rotate, speed);
    var slides = $('.slide');
    var container = $('#slides ul');
    var elm = container.find(':first-child').prop("tagName");
    var item_width = container.width();
    var previous = 'prev'; //id of previous button
    var next = 'next'; //id of next button
    slides.width(item_width); //set the slides to the correct pixel width
    container.parent().width(item_width);
    container.width(slides.length * item_width); //set the slides container to the correct total width
    container.find(elm + ':first').before(container.find(elm + ':last'));
    resetSlides();
    
    
    //if user clicked on prev button
    
    $('#buttons a').click(function (e) {
        //slide the item
        
        if (container.is(':animated')) {
            return false;
        }
        if (e.target.id == previous) {
            container.stop().animate({
                'left': 0
            }, 1500, function () {
                container.find(elm + ':first').before(container.find(elm + ':last'));
                resetSlides();
            });
        }
        
        if (e.target.id == next) {
            container.stop().animate({
                'left': item_width * -2
            }, 1500, function () {
                container.find(elm + ':last').after(container.find(elm + ':first'));
                resetSlides();
            });
        }
        
        //cancel the link behavior            
        return false;
        
    });
    
    //if mouse hover, pause the auto rotation, otherwise rotate it    
    container.parent().mouseenter(function () {
        clearInterval(run);
    }).mouseleave(function () {
        run = setInterval(rotate, speed);
    });
    
    
    function resetSlides() {
        //and adjust the container so current is in the frame
        container.css({
            'left': -1 * item_width
        });
    }
    
});
//a simple function to click next link
//a timer will call this function, and the rotation will begin

function rotate() {
    $('#next').click();
}
</script>