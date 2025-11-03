
  // Agrega credenciales de SDK
  const mp = new MercadoPago("TEST-4effdaf0-3ee1-4763-aa34-8b02fc5ad550", {
    locale: "es-MX",
  });


  // Inicializa el checkout
  mp.checkout({
    preference: {
      id: preferencias,
      /*  payer: $('#disponibilidad').val() */

      //autoOpen: false,
    },
    render: {
      container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
      label: 'Mercado Pago', // Cambia el texto del botón de pago (opcional)
      img: " "

    },
    theme: {
      elementsColor: "#0088F7",
      headerColor: "#0088F7"
    },
  });
