  @extends('main')
    @section('content')
    <div class="container">
      <div class="section">
        <label><h1>Item For Sale</h1></label>
        <table class = "highlight">
              <thead>
              <tr>
                <th data-field="id">Name</th>
                <th data-field="name">Item Name</th>
                <th data-field="price">Item Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Alvin</td>
                <td>Eclair</td>
                <td>$0.87</td>
                <td>Add to Cart</td>
                
              </tr>
              <tr>
                <td>Alan</td>
                <td>Jellybean</td>
                <td>$3.76</td>
              </tr>
              <tr>
                <td>Jonathan</td>
                <td>Lollipop</td>
                <td>$7.00</td>
              </tr>
            </tbody>
          </table>
    </div>
  </div>
  <br>
  <br>
    <footer class="page-footer orange">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">
            Sales System.</p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by 
      <a class="orange-text text-lighten-3">KSK Laravel Sale System Example</a>
      </div>
    </div>
  </footer>
  @endsection