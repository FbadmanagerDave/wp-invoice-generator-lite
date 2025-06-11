<div id="invoice-generator" style="max-width: 800px; margin: auto;">
  <h2 contenteditable="true">Your Company Name</h2>
  <input type="text" placeholder="Client Name"><br><br>

  <table id="invoice-table" style="width:100%; border-collapse: collapse;">
    <thead>
      <tr>
        <th>Description</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody id="invoice-items">
      <tr>
        <td contenteditable="true">Service A</td>
        <td contenteditable="true">1</td>
        <td contenteditable="true">100</td>
        <td class="line-total">$100.00</td>
      </tr>
    </tbody>
  </table>

  <button id="add-row">Add Item</button><br><br>
  <p>Total: <span id="invoice-total">$100.00</span></p>
  <button id="download-btn">Download Invoice PDF</button>
</div>
