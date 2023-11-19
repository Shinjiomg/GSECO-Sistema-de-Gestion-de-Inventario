// Función que se ejecutará al cambiar el valor del input
function handleChange(event) {
    console.log('Input value:', event.target.value);
    // Aquí puedes realizar alguna acción con el valor del input
  }
  
  // Debounce function
  function debounce(func, delay) {
    let timeoutId;
  
    return function() {
      const context = this;
      const args = arguments;
  
      clearTimeout(timeoutId);
  
      timeoutId = setTimeout(() => {
        func.apply(context, args);
      }, delay);
    };
  }
  
  // Obtener el input
  const inputElement = document.getElementById('keyword');
  
  // Aplicar debounce a la función handleChange con un retraso de 300 milisegundos
  const debouncedChange = debounce(handleChange, 300);
  
  // Escuchar el evento de cambio en el input y ejecutar la función debouncedChange
  inputElement.addEventListener('input', debouncedChange);
  