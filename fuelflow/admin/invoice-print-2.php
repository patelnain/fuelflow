
<style>



td,th{
    width: 70px;
    max-width: 70px;
    margin-left: 20px;
    
    border-top: 1px solid;
    border-collapse: collapse !important;
}

td.price,
th.price {
    width: 90px !important;
    max-width:100% !important;
   
}

.centered {
    text-align: center;
    align-content: center;
}

.print {
    max-width: 800px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    font-size: 16px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
}


@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
</style>

<div class="print">
            <img src="../assets/images/logo.png" alt="Logo" width="120px">
            <p class="centered">RECEIPT EXAMPLE
                <br>Address line 1
                <br>Address line 2</p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Description</th>
                        <th class="price"> $$</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="quantity">1.00</td>
                        <td class="description">ARDUINO UNO R3</td>
                        <td class="price">&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;$25.00</td>
                    </tr>
                    <tr>
                        <td class="quantity">2.00</td>
                        <td class="description">JAVASCRIPT BOOK</td>
                        <td class="price">&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;$10.00</td>
                    </tr>
                    <tr>
                        <td class="quantity">1.00</td>
                        <td class="description">STICKER PACK</td>
                        <td class="price">&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;$10.00</td>
                    </tr>
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">TOTAL</td>
                        <td class="price">&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;$55.00</td>
                    </tr>
                </tbody>
            </table>
            <p class="centered">Thanks for your purchase!
                <br>Ghartak Service</p>

                <button onclick="window.print()">Print this page</button>
        </div>