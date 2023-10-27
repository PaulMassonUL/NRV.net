const printButtons = document.querySelectorAll('.print-button');

printButtons.forEach(button => {
    button.addEventListener('click', () => {
        const ticketId = button.getAttribute('data-print');

        const ticket = document.querySelector(`#${ticketId}`);

        const printWindow = window.open();

        printWindow.document.write('<html><head><title>Billet à imprimer</title></head><body>');
        printWindow.document.write(ticket.outerHTML);
        printWindow.document.write('<style>.print-button{display:none}.card{background-color: #D9D9D9;box-shadow: 0 0 14px 5px rgba(0, 0, 0, 0.6);border-radius: 20px;padding: 20px;text-align: center;margin-bottom: 40px;}.card-ticket {box-shadow: 0 0 14px 5px rgba(0, 0, 0, 0.6);border-radius: 20px;padding: 20px;background-color: rgba(248, 58, 62, 0.5);}</style>')
        printWindow.document.write('</body></html>');

        printWindow.document.close();
        printWindow.print();
    });
});
