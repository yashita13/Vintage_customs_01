document.addEventListener("DOMContentLoaded", function() {
    const carContainers = document.querySelectorAll(".car-container");
  
    carContainers.forEach(function(carContainer) {
      const oldCar = carContainer.querySelector(".old-car");
      const newCar = carContainer.querySelector(".new-car");
  
      carContainer.addEventListener("click", function() {
        const newCarURL = newCar.getAttribute("src");
        window.open(newCarURL, "_blank");
      });
    });
  });
  