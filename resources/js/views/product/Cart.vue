<template>
  <div>
    <main class="overflow-hidden">
      <!--Start Breadcrumb Style2-->
      <section
        class="breadcrumb-area"
        style="background-image: url(assets/images/inner-pages/breadcum-bg.png)"
      >
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="breadcrumb-content text-center wow fadeInUp animated">
                <h2>Cart</h2>
                <div class="breadcrumb-menu">
                  <ul>
                    <li>
                      <a href="index.html"
                        ><i class="flaticon-home pe-2"></i>Home</a
                      >
                    </li>
                    <li><i class="flaticon-next"></i></li>
                    <li class="active">Cart</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--End Breadcrumb Style2-->
      <!--Start cart area-->
      <section class="cart-area pt-120 pb-120">
        <div class="container">
          <div class="row wow fadeInUp animated">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <div class="cart-table-box">
                <div class="table-outer">
                  <table class="cart-table">
                    <thead class="cart-header">
                      <tr>
                        <th class="">Product Name</th>
                        <th class="price">Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th class="hide-me"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="cartItem in cart" :key="cartItem.id">
                        <td>
                          <div class="thumb-box">
                            <a href="shop-details-1.html" class="thumb">
                              <img
                                :src="cartItem.product.preview_image"
                                :alt="cartItem.product.title"
                              />
                            </a>
                            <a href="shop-details-1.html" class="title">
                              <h5>{{ cartItem.product.title }}</h5>
                            </a>
                          </div>
                        </td>
                        <td>$ {{ cartItem.product.price }}</td>
                        <td class="qty">
                          <div class="qtySelector text-center">
                            <span class="decreaseQty"
                              ><i class="flaticon-minus"></i>
                            </span>
                            <input type="number" class="qtyValue" value="1" />
                            <span class="increaseQty">
                              <i class="flaticon-plus"></i>
                            </span>
                          </div>
                        </td>
                        <td class="sub-total">$ {{ cartItem.product.price * cartItem.quantity }}</td>
                        <td>
                          <div class="remove">
                            <i class="flaticon-cross"></i>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="cart-button-box">
                <div class="apply-coupon wow fadeInUp animated">
                  <div class="apply-coupon-input-box mt-30">
                    <input
                      type="text"
                      name="coupon-code"
                      value=""
                      placeholder="Coupon Code"
                    />
                  </div>
                  <div class="apply-coupon-button mt-30">
                    <button class="btn--primary style2" type="submit">
                      Apply Coupon
                    </button>
                  </div>
                </div>
                <div class="cart-button-box-right wow fadeInUp animated">
                  <button class="btn--primary mt-30" type="submit">
                    Continue Shopping
                  </button>
                  <button class="btn--primary mt-30" type="submit">
                    Update Cart
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="row w-25">
            <input type="text" v-model="first_name" placeholder="first_name">
            <input type="text" v-model="patronymic" placeholder="patronymic">
            <input type="text" v-model="last_name" placeholder="last_name">
            <input type="text" v-model="email" placeholder="email">
            <input type="text" v-model="address" placeholder="address">
            <select v-model="gender">
              <option disabled>your gender</option>
              <option value="0">male</option>
              <option value="1">female</option>
            </select>
            <input @click.prevent="storeOrder()" type="submit" value="order confirm">
          </div>
          <div class="row pt-120">
            <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
              <div class="cart-total-box">
                <div class="inner-title">
                  <h3>Cart Totals</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt--30">
            <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
              <div class="cart-total-box mt-30">
                <div class="table-outer">
                  <table class="cart-table2">
                    <thead class="cart-header clearfix">
                      <tr>
                        <th colspan="1" class="shipping-title">Shipping</th>
                        <th class="price" v-if="cart != null">$ {{ getTotalPrice }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="shipping">Shipping</td>
                        <td class="selact-box1">
                          <ul class="shop-select-option-box-1">
                            <li>
                              <input
                                type="checkbox"
                                name="free_shipping"
                                id="option_1"
                                checked=""
                              />
                              <label for="option_1"
                                ><span></span>Free Shipping</label
                              >
                            </li>
                            <li>
                              <input
                                type="checkbox"
                                name="flat_rate"
                                id="option_2"
                              />
                              <label for="option_2"
                                ><span></span>Flat Rate</label
                              >
                            </li>
                            <li>
                              <input
                                type="checkbox"
                                name="local_pickup"
                                id="option_3"
                              />
                              <label for="option_3"
                                ><span></span>Local Pickup</label
                              >
                            </li>
                          </ul>
                          <div class="inner-text">
                            <p>
                              Shipping options will be updated during checkout
                            </p>
                          </div>
                          <h4>Calculate Shipping</h4>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <h4 class="total">Total</h4>
                        </td>
                        <td class="subtotal">$ {{ getTotalPrice }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
              <div class="cart-check-out mt-30">
                <h3>Check Out</h3>
                <ul class="cart-check-out-list">
                  <li>
                    <div class="left">
                      <p>Subtotal</p>
                    </div>
                    <div class="right">
                      <p>$ {{ getTotalPrice }}</p>
                    </div>
                  </li>
                  <li>
                    <div class="left">
                      <p>Shipping</p>
                    </div>
                    <div class="right">
                      <p><span>Flat rate:</span> $50.00</p>
                    </div>
                  </li>
                  <li>
                    <div class="left">
                      <p>Total Price:</p>
                    </div>
                    <div class="right">
                      <p>$ {{ getTotalPrice + 50 }}</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--End cart area-->
    </main>
  </div>
</template>

<script>
export default {
  name: "Cart",
  data() {
    return {
      cart: JSON.parse(localStorage.getItem('cart')),
      first_name: null,
      patronymic: null,
      last_name: null,
      address: null,
      email: null,
      gender: null,
    }
  },
  computed: {
    getTotalPrice() {
      let totalPrice = 0;
      JSON.parse(localStorage.getItem('cart')).forEach(item => {
        totalPrice += item.product.price * item.quantity;
      });
      return totalPrice;
    }
  },
  methods: {
    storeOrder() {
      this.axios.post('/api/orders/store', {
        first_name: this.first_name,
        last_name: this.last_name,
        patronymic: this.patronymic,
        address: this.address,
        gender: this.gender,
        totalPrice: this.getTotalPrice,
        email: this.email,
        products: [this.cart]
      })
      .then(response => {
        console.log(response);
      });
    }
  }
};
</script>

<style scoped>
</style>
