$(function () {


    


    //Horizontal form basic
    $('#wizard_horizontal_icon').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        }
    });
    
    //Horizontal form basic
    $('#wizard_horizontal').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            if (currentIndex == 1) {
                console.log("haeee");
            


                
                    const container = document.querySelector(".container");
                    // console.log(container);
                    // console.log(container);
                const seats = document.querySelectorAll(".row .seat:not(.occupied)");
                    // console.log('ini seats' +seats);
                const count = document.getElementById("count");
                const total = document.getElementById("total");
                const movieSelect = document.getElementById("movie");
                let ticketPrice = +movieSelect.value;
                
                
                // Note: localStorage is not enabled in CodePen for security reasons.
                function populateUI() {
                  const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));
                  if (selectedSeats !== null && selectedSeats.length > 0) {
                    seats.forEach((seat, index) => {
                      if (selectedSeats.indexOf(index) > -1) seat.classList.add("selected");
                    });
                  }
                  const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");
                  if (selectedMovieIndex !== null)
                    movieSelect.selectedIndex = selectedMovieIndex;
                }
                
                function setMovieData(movieIndex, moviePrice) {
                  localStorage.setItem("selectedMovieIndex", movieIndex);
                  localStorage.setItem("selectedMoviePrice", moviePrice);
                }
                
                function updateSelectedCount() {
                    console.log("masuk ke update");
                  const selectedSeats = document.querySelectorAll(".row .seat.selected");
                  // const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));
                  // localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));
                  const selectedSeatsCount = selectedSeats.length;
                  count.innerText = selectedSeatsCount;
                  total.innerText = selectedSeatsCount * ticketPrice;
                }
                
                movieSelect.addEventListener("change", (e) => {
                  ticketPrice = +e.target.value;
                  // setMovieData(e.target.selectedIndex, e.target.value);
                  updateSelectedCount();
                });
                
                // container.addEventListener("click", (e) => {
                //         console.log("ini class list " + e.target.classList); 
                //   if (
                //     !e.target.classList.contains("selected") &&
                //     !e.target.classList.contains("occupied")
                //   ) {
                //       console.log('haha');
                   
                //     e.target.classList.add("selected");
                //     updateSelectedCount();
                //   }
                //   else {
                //       console.log("masuk else");
                //     e.target.classList.remove("selected");
                //     updateSelectedCount();
                // }
                // });
                $(window).click(function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                        // alert(e.target.classList);
                     if (
                        e.target.classList.contains("seat") &&
                    !e.target.classList.contains("selected") &&
                    !e.target.classList.contains("occupied")
                  ) {
                      console.log('haha');
                   
                    e.target.classList.add("selected");
                    updateSelectedCount();
                  }
                  else {
                      console.log("masuk else");
                    e.target.classList.remove("selected");
                    updateSelectedCount();
                }
                });
                
                
                // function add(e) {

                //     console.log("add");

                //     if (
                //     e.target.classList.contains("seat") &&
                //     !e.target.classList.contains("occupied")
                //   ) {
                //     e.target.classList.toggle("selected");
                //     updateSelectedCount();
                //   }
                // }
                
                // Init
                // populateUI();
                // populateUI();
                // updateSelectedCount();
                
                
              





                
            }


            else if(currentIndex == 2){
                var name = $('#name').val();
             
                $('#contenter').html(`
                
                <div class="item">
    <div class="item-right">
      <h2 class="num">10</h2>
      <p class="day">Feb</p>
      <h3 class="num">2004</h3>
      <span class="up-border"></span>
      <span class="down-border"></span>
    </div> <!-- end item-right -->
    
    <div class="item-left">
      <p class="event">${name}</p>
      <h2 class="title"></h2>
      
      <div class="sce">
        <div class="icon">
          <i class="fa fa-table"></i>
        </div>
        <p>Monday 15th 2016 <br/> 15:20Pm & 11:00Am</p>
      </div>
      <div class="fix"></div>
      <div class="loc">
        <div class="icon">
          <i class="fa fa-map-marker"></i>
        </div>
        <p>North,Soth, United State , Amre <br/> Party Number 16,20</p>
      </div>
      <div class="fix"></div>
      <button class="tickets">Tickets</button>
    </div> <!-- end item-right -->
  </div> <!-- end item -->
  
                `);


            }

            setButtonWavesEffect(event);
        }
    });

    //Vertical form basic
    $('#wizard_vertical').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        stepsOrientation: 'vertical',
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        }
    });

    //Advanced form with validation
    var form = $('#wizard_with_validation').show();
        form.steps({
        headerTag: 'h3',
        bodyTag: 'fieldset',
        transitionEffect: 'slideLeft',        
        onStepChanging: function (event, currentIndex, newIndex) {
            
            if (currentIndex > newIndex) { return true; }

            if (currentIndex < newIndex) {
                form.find('.body:eq(' + newIndex + ') label.error').remove();
                form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
            }
            // if (newIndex == 1){
            //     set
            // }

            form.validate().settings.ignore = ':disabled,:hidden';
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ':disabled';
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            swal("Good job!", "Submitted!", "success");
        }
    });

    form.validate({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
        rules: {
            'confirm': {
                equalTo: '#password'
            }
        }
    });
});

function setButtonWavesEffect(event) {
    $(event.currentTarget).find('[role="menu"] li a').removeClass('');
    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('');
}