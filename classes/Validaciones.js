class InputValidator {
  constructor(inputElements) {
    this.inputElements = inputElements;

    // Llamar al método para configurar los event listeners en cada input
    this.addEventListeners();
  }

  // Método que limpia el input de caracteres no numéricos
  cleanInput(inputElement) {
    inputElement.value = inputElement.value.replace(/[^\d]/g, '');

    // Evitar la entrada de números negativos
    if (parseInt(inputElement.value) < 0) {
      inputElement.value = '';
    }
  }

  // Método que agrega event listeners a todos los inputs
  addEventListeners() {
    this.inputElements.forEach((inputElement) => {
      inputElement.addEventListener('input', () => {
        this.cleanInput(inputElement);
      });
    });
  }
}

// Cuando el DOM esté cargado, instanciar la clase para todos los inputs
document.addEventListener('DOMContentLoaded', () => {
  const chequeInputs = document.querySelectorAll('.numero_cheque');
  new InputValidator(chequeInputs);
});
