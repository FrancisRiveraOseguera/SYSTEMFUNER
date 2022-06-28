document.addEventListener("DOMContentLoaded", () =>{
    const $boton = document.querySelector("#btn");
    $boton.addEventListener("click", () => {
        const $elementoPdf = document.body;

        html2pdf()
            .set({
                margin: 0,
                filename:'Documento.pdf',
                image: {
                    type:'jpeg',
                    quality: 1
                },
                html2canvas: {
                    margin: 0,
                    scale: 2,
                    letterRendering: true,
                    widht: 1333
                },
                jsPDF:{
                    unit: 'mm',
                    format: 'A6',
                    orientation: 'Landscape'
                }

            })

            .from($elementoPdf)
            .save()
            .catch(err => console.log(err))
            .finally()
            .then(() => {
                console.log("PDF guardado!")
            })
    });
});