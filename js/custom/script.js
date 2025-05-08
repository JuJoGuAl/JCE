document.addEventListener('DOMContentLoaded', () => {
    // Seleccionar el botón y el contenido del menú desplegable
    const dropdownButton = document.getElementById("dropdownMenuButton");
    const dropdownContent = document.getElementById("dropdown-content");
    // Obtiene el modal
    const modal = document.getElementById("miModal");
    // Obtiene el botón que abre el modal
    const btnModal = document.getElementById("abrirModal");
    const btnModal2 = document.getElementById("abrirModal2");
    // Obtiene el elemento <span> que cierra el modal
    const spanModal = document.getElementsByClassName("cerrar")[0];

    const sectionMarcas = document.getElementById("marcas");

    // Alternar la visualización del contenido del menú desplegable
    dropdownButton.onclick = function() {
        dropdownContent.classList.toggle("show");
    };

    document.addEventListener('click', function(event) {
        var isDropdownButton = dropdownButton.contains(event.target);
        var isInsideDropdown = dropdownContent.contains(event.target);
        if (!isDropdownButton && !isInsideDropdown && dropdownContent.classList.contains('show')) {
            dropdownContent.classList.remove('show');
        }
    });


    // Cuando el usuario hace clic en el botón, abre el modal
    if (btnModal) {
        btnModal.onclick = function() {
            modal.style.display = "block";
        }
    }
    // Cuando el usuario hace clic en el botón, abre el modal
    if (btnModal2) {
        btnModal2.onclick = function() {
            modal.style.display = "block";
        }
    }

    // Cuando el usuario hace clic en <span> (x), cierra el modal
    if (spanModal) {
        spanModal.onclick = function() {
            modal.style.display = "none";
        }
    }

    // Cuando el usuario hace clic en cualquier lugar fuera del modal, lo cierra
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    //marcas
    if (sectionMarcas){
        const brandsSlider = {
            elements: {
                brandImage: null,
                brandLogo: null,
                brandLogoWhite: null,
                brandDescription: null,
                thumbnails: null,
                prevButton: null,
                nextButton: null,
                thumbnailsContainer: null
            },
            
            currentIndex: 0,
            thumbnailGap: 15,
    
            init() {
                this.elements = {
                    brandImage: document.getElementById('brand-image'),
                    brandLogo: document.getElementById('brand-logo'),
                    brandDescription: document.getElementById('brand-description'),
                    brandProductsLink: document.getElementById('brand-link'),
                    thumbnails: document.querySelectorAll('.brands-thumbnails'),
                    prevButton: document.querySelector('.slider-nav.prev'),
                    nextButton: document.querySelector('.slider-nav.next'),
                    thumbnailsContainer: document.querySelector('.brands-thumbnails-container')
                };
    
                this.addEventListeners();
                this.showBrand(0);
            },
    
            showBrand(index) {
                const thumbnail = this.elements.thumbnails[index];
                if (!thumbnail) return;
    
                this.elements.brandImage.src = thumbnail.getAttribute('data-image');
                this.elements.brandImage.alt = thumbnail.getAttribute('data-marca-nombre');
                this.elements.brandLogo.src = thumbnail.getAttribute('data-logo');
                this.elements.brandLogo.alt = thumbnail.getAttribute('data-marca-nombre');
                this.elements.brandDescription.textContent = thumbnail.getAttribute('data-texto') + thumbnail.getAttribute('data-texto');
                this.elements.brandProductsLink.setAttribute('data-marca-id', thumbnail.getAttribute('data-marca-id'));
    
                this.elements.thumbnails.forEach(thumb => thumb.classList.remove('active'));
                thumbnail.classList.add('active');
                this.currentIndex = index;
            },
    
            scrollThumbnails(direction) {
                const thumbnailWidth = this.elements.thumbnails[0]?.offsetWidth || 0;
                const scrollAmount = (thumbnailWidth + this.thumbnailGap) * direction;
                
                this.elements.thumbnailsContainer.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            },
    
            addEventListeners() {
                this.elements.thumbnails.forEach((thumbnail, index) => {
                    thumbnail.addEventListener('click', () => this.showBrand(index));
                });
    
                this.elements.prevButton.addEventListener('click', () => this.scrollThumbnails(-1));
                this.elements.nextButton.addEventListener('click', () => this.scrollThumbnails(1));
            }
        };
    
        brandsSlider.init();
    }
});
