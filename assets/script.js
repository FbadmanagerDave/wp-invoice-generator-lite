// Function to update total
function updateTotal() {
  let total = 0;
  document.querySelectorAll("#invoice-items tr").forEach(row => {
    const qty = parseFloat(row.cells[1]?.innerText || 0);
    const price = parseFloat(row.cells[2]?.innerText || 0);
    const lineTotal = qty * price;
    if (!isNaN(lineTotal)) {
      row.cells[3].innerText = `$${lineTotal.toFixed(2)}`;
      total += lineTotal;
    }
  });
  document.getElementById("invoice-total").innerText = `$${total.toFixed(2)}`;
}

// Add new row
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("add-row").addEventListener("click", function () {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td contenteditable="true">New Item</td>
      <td contenteditable="true">1</td>
      <td contenteditable="true">0</td>
      <td class="line-total">$0.00</td>
    `;
    document.getElementById("invoice-items").appendChild(row);
    updateTotal();
  });

  document.getElementById("invoice-items").addEventListener("input", updateTotal);
  updateTotal();

  // Download as PDF
  document.getElementById("download-btn").addEventListener("click", function () {
    html2canvas(document.getElementById("invoice-generator")).then(canvas => {
      const imgData = canvas.toDataURL("image/png");
      const pdf = new jsPDF("p", "pt", "a4");
      pdf.addImage(imgData, "PNG", 20, 20);
      pdf.save("invoice.pdf");
    });
  });
});
