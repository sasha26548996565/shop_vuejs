<template>
  <div>
    <main class="overflow-hidden">
      <!--Start Breadcrumb Style2-->
      <div
        class="breadcrumb-area"
        style="
          background-image: url(assets/images/inner-pages/breadcum-bg.png);
        "
      >
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div
                class="breadcrumb-content pb-60 text-center wow fadeInUp animated"
              >
                <h2>Shop Grid</h2>
                <div class="breadcrumb-menu">
                  <ul>
                    <li>
                      <a href="index.html"
                        ><i class="flaticon-home pe-2"></i>Home</a
                      >
                    </li>
                    <li><i class="flaticon-next"></i></li>
                    <li class="active">Shop Grid</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End Breadcrumb Style2-->
      <!--Start Product Categories One-->
      <section class="product-categories-one pb-60">
        <div class="container">
          <div class="row wow fadeInUp animated">
            <div class="col-xl-12">
              <div class="product-categories-one__inner">
                <ul>
                  <li>
                    <a href="#0" class="img-box">
                      <div class="inner">
                        <img
                          src="assets/images/shop/product-categories-v1-img1.png"
                          alt=""
                        />
                      </div>
                    </a>
                    <div class="title">
                      <a href="#0">
                        <h6>Accessories</h6>
                      </a>
                    </div>
                  </li>
                  <li>
                    <a href="#0" class="img-box">
                      <div class="inner">
                        <img
                          src="assets/images/shop/product-categories-v1-img2.png"
                          alt=""
                        />
                      </div>
                    </a>
                    <div class="title">
                      <a href="#0">
                        <h6>Furnitures</h6>
                      </a>
                    </div>
                  </li>
                  <li>
                    <a href="#0" class="img-box">
                      <div class="inner">
                        <img
                          src="assets/images/shop/product-categories-v1-img3.png"
                          alt=""
                        />
                      </div>
                    </a>
                    <div class="title">
                      <a href="#0">
                        <h6>Jewellery</h6>
                      </a>
                    </div>
                  </li>
                  <li>
                    <a href="#0" class="img-box">
                      <div class="inner">
                        <img
                          src="assets/images/shop/product-categories-v1-img4.png"
                          alt=""
                        />
                      </div>
                    </a>
                    <div class="title">
                      <a href="#0">
                        <h6>Shoes</h6>
                      </a>
                    </div>
                  </li>
                  <li>
                    <a href="#0" class="img-box">
                      <div class="inner">
                        <img
                          src="assets/images/shop/product-categories-v1-img5.png"
                          alt=""
                        />
                      </div>
                    </a>
                    <div class="title">
                      <a href="#0">
                        <h6>Electronics</h6>
                      </a>
                    </div>
                  </li>
                  <li>
                    <a href="#0" class="img-box">
                      <div class="inner">
                        <img
                          src="assets/images/shop/product-categories-v1-img6.png"
                          alt=""
                        />
                      </div>
                    </a>
                    <div class="title">
                      <a href="#0">
                        <h6>Fashion</h6>
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--End Product Categories One-->
      <!--Start product-grid-->
      <div class="product-grid pt-60 pb-120">
        <div class="container">
          <div class="row gx-4">
            <div class="col-xl-3 col-lg-4">
              <div class="shop-grid-sidebar">
                <button class="remove-sidebar d-lg-none d-block">
                  <i class="flaticon-cross"> </i>
                </button>
                <div class="sidebar-holder">
                  <form
                    action="#0"
                    class="footer-default__subscrib-form m-0 p-0 wow fadeInUp animated"
                  >
                    <div class="footer-input-box p-0">
                      <input
                        type="email"
                        placeholder="Email address"
                        name="email"
                      />
                      <button type="submit" class="subscribe_btn">
                        <i class="flaticon-magnifying-glass"></i>
                      </button>
                    </div>
                  </form>
                  <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                    <h4>Select Categories</h4>
                    <div class="checkbox-item">
                      <form>
                        <div class="form-group" v-for="category in filterList.categories" :key="category.id">
                          <input type="checkbox" :id="`category${category.id}`" :value="category.id" v-model="categories" />
                          <label :for="`category${category.id}`">{{ category.title }}</label>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                    <h4>Color Option</h4>
                    <ul class="color-option">
                      <li v-for="color in filterList.colors" :key="color.id">
                        <a @click.prevent="addColor(color.id)"
                          href="#0"
                          class="color-option-single"
                          :style="`background: ${color.title}`"
                        >
                          <span>{{ color.title }}</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                    <h4>Filter By Price</h4>
                    <div class="slider-box">
                      <div id="price-range" class="slider"></div>
                      <div class="output-price">
                        <label for="priceRange">Price:</label>
                        <input type="text" id="priceRange" readonly />
                      </div>
                      <button @click.prevent="filterProducts()" class="filterbtn" type="submit">Filter</button>
                    </div>
                  </div>
                  <div
                    class="single-sidebar-box mt-30 wow fadeInUp animated pb-0 border-bottom-0"
                  >
                    <h4>Tags</h4>
                    <ul class="popular-tag">
                      <li v-for="tag in filterList.tags" :key="tag.id">
                        <a @click.prevent="addTag(tag.id)" href="#0">{{ tag.title }}</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-9 col-lg-8">
              <div class="row">
                <div class="col-xl-12">
                  <div
                    class="shop-grid-page-top-info p-0 justify-content-md-between justify-content-center"
                  >
                    <div class="left-box wow fadeInUp animated">
                      <p>Showing 1–12 of 50 Results</p>
                    </div>
                    <div
                      class="right-box justify-content-md-between justify-content-center wow fadeInUp animated"
                    >
                      <div class="short-by">
                        <div class="select-box">
                          <select class="wide" @change.prevent="sortProducts(sortType)" v-model="sortType">
                            <option data-display="Short by latest">
                              Featured
                            </option>
                            <!-- <option value="1">Best selling</option> -->
                            <option value="title|asc">Alphabetically, A-Z</option>
                            <option value="title|desc">Alphabetically, Z-A</option>
                            <option value="price|asc">Price, low to high</option>
                            <option value="price|desc">Price, high to low</option>
                            <!-- <option value="3">Date, old to new</option> -->
                          </select>
                        </div>
                      </div>
                      <div
                        class="product-view-style d-flex justify-content-md-between justify-content-center"
                      >
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button
                              class="nav-link active"
                              id="pills-grid-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-grid"
                              type="button"
                              role="tab"
                              aria-selected="true"
                            >
                              <i class="flaticon-grid"></i>
                            </button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button
                              class="nav-link"
                              id="pills-list-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-list"
                              type="button"
                              role="tab"
                              aria-selected="false"
                            >
                              <i class="flaticon-list"></i>
                            </button>
                          </li>
                        </ul>
                        <button class="slidebarfilter d-lg-none d-flex">
                          <i class="flaticon-edit"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="tab-content" id="pills-tabContent">
                    <div
                      class="tab-pane fade show active"
                      id="pills-grid"
                      role="tabpanel"
                      aria-labelledby="pills-grid-tab"
                    >
                      <div class="row">
                        <div
                          class="col-xl-4 col-lg-6 col-6"
                          v-for="product in products"
                          :key="product.id"
                        >
                          <div class="products-three-single w-100 mt-30">
                            <div class="products-three-single-img">
                              <a href="shop-details-3.html" class="d-block">
                                <img
                                  :src="product.preview_image"
                                  class="first-img"
                                  alt=""
                                />
                                <img
                                  src="assets/images/home-three/productss2-hover-1.png"
                                  alt=""
                                  class="hover-img"
                                />
                              </a>
                              <div class="products-grid-one__badge-box">
                                <span class="bg_base badge new">New</span>
                              </div>
                              <a @click.prevent="addCart(product.id, true)" href="#"
                                class="addcart btn--primary style2"
                              >
                                Add To Cart
                              </a>
                              <div class="products-grid__usefull-links">
                                <ul>
                                  <li>
                                    <a href="wishlist.html">
                                      <i class="flaticon-heart"> </i>
                                      <span> wishlist</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="compare.html">
                                      <i
                                        class="flaticon-left-and-right-arrows"
                                      ></i>
                                      <span> compare</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a
                                      @click="getProduct(product.id)"
                                      :href="`#popup${product.id}`"
                                      class="popup_link"
                                    >
                                      <i class="flaticon-visibility"></i>
                                      <span> quick view</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div
                              :id="`popup${product.id}`"
                              class="product-gird__quick-view-popup mfp-hide"
                            >
                              <div
                                v-if="popupProduct != null"
                                class="container"
                              >
                                <div
                                  class="row justify-content-between align-items-center"
                                >
                                  <div class="col-lg-6">
                                    <div class="quick-view__left-content">
                                      <div class="tabs">
                                        <div class="popup-product-thumb-box">
                                          <ul>
                                            <li
                                              v-for="productImage in popupProduct.product_images"
                                              :key="productImage.id"
                                              class="tab-nav popup-product-thumb"
                                            >
                                              <a
                                                :href="`#tabb${productImage.id}`"
                                              >
                                                <img
                                                  :src="productImage.image"
                                                  alt=""
                                                />
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                        <div
                                          class="popup-product-main-image-box"
                                        >
                                          <div
                                            v-for="productImage in popupProduct.product_images"
                                            :key="productImage.id"
                                            :id="`tabb${productImage.id}`"
                                            class="tab-item popup-product-image"
                                          >
                                            <div
                                              class="popup-product-single-image"
                                            >
                                              <img
                                                :src="productImage.image"
                                                alt=""
                                              />
                                            </div>
                                          </div>
                                          <button class="prev">
                                            <i class="flaticon-back"></i>
                                          </button>
                                          <button class="next">
                                            <i class="flaticon-next"></i>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="popup-right-content">
                                      <h3>{{ popupProduct.title }}</h3>
                                      <div class="ratting">
                                        <i class="flaticon-star"></i>
                                        <i class="flaticon-star"></i>
                                        <i class="flaticon-star"></i>
                                        <i class="flaticon-star"></i>
                                        <i class="flaticon-star"></i>
                                        <span>{{ popupProduct.count }}</span>
                                      </div>
                                      <p class="text">
                                        {{ popupProduct.description }}
                                      </p>
                                      <div class="price">
                                        <h2>
                                          <del v-if="product.old_price != null">${{ product.old_price }}</del> $
                                          {{ product.price }}
                                        </h2>
                                        <h6 v-if="popupProduct.count > 0">
                                          In stuck
                                        </h6>
                                        <h6 v-else>No stuck</h6>
                                      </div>
                                      <div class="color-varient">
                                        <template
                                          v-for="productGroup in popupProduct.group_products"
                                          :key="productGroup.id"
                                        >
                                          <a
                                            @click.prevent="getProduct(productGroup.id)"
                                            href="#0"
                                            v-for="color in productGroup.colors"
                                            :key="color.id"
                                            class="color-name"
                                            :style="`background: ${color.title}`"
                                          >
                                            <span>{{ color.title }}</span>
                                          </a>
                                        </template>
                                      </div>
                                      <div class="add-product">
                                        <h6>Qty:</h6>
                                        <div class="button-group">
                                          <div class="qtySelector text-center">
                                            <span class="decreaseQty"
                                              ><i class="flaticon-minus"></i>
                                            </span>
                                            <input
                                              type="number"
                                              class="qtyValue"
                                              value="1"
                                            />
                                            <span class="increaseQty">
                                              <i class="flaticon-plus"></i>
                                            </span>
                                          </div>
                                          <button @click.prevent="addCart(product.id, false)" class="btn--primary">
                                            Add to Cart
                                          </button>
                                        </div>
                                      </div>
                                      <div class="payment-method">
                                        <a href="#0">
                                          <img
                                            src="http://localhost:5173/assets/images/payment_method/method_1.png"
                                            alt=""
                                          />
                                        </a>
                                        <a href="#0">
                                          <img
                                            src="http://localhost:5173/assets/images/payment_method/method_2.png"
                                            alt=""
                                          />
                                        </a>
                                        <a href="#0">
                                          <img
                                            src="http://localhost:5173/assets/images/payment_method/method_3.png"
                                            alt=""
                                          />
                                        </a>
                                        <a href="#0">
                                          <img
                                            src="http://localhost:5173/assets/images/payment_method/method_4.png"
                                            alt=""
                                          />
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div
                              class="products-three-single-content text-center"
                            >
                              <span>{{ product.category.title }}</span>
                              <h5>
                                <router-link :to="{name: 'product.show', params: {id: product.id}}">
                                  {{ product.title }}
                                </router-link>
                              </h5>
                              <p>
                                <del v-if="product.old_price != null">${{ product.old_price }}</del> $
                                {{ product.price }}
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div
                  class="col-12 d-flex justify-content-center wow fadeInUp animated"
                >
                  <ul class="pagination text-center" v-if="pagination.last_page > 1">
                    <li class="next" v-if="pagination.current_page != 1">
                      <a href="#0" @click.prevent="getProducts(pagination.current_page - 1)"
                        ><i class="flaticon-left-arrows" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li v-for="link in pagination.links" :key="link.label">
                      <template v-if="Number(link.label) && (pagination.current_page - link.label < 2
                          && pagination.current_page - link.label > -2) || Number(link.label) == 1
                          || Number(link.label) == pagination.last_page">
                        <a @click.prevent="getProducts(link.label)" :class="link.active ? 'active' : ''" href="#0">{{ link.label }}</a>
                      </template>
                      <template v-if="Number(link.label) && ((pagination.current_page - link.label == 2)
                        && (pagination.current_page != 3)) || ((pagination.current_page != pagination.last_page - 2)
                        && (pagination.current_page - link.label == -2))">
                        <a href="#">...</a>
                      </template>
                    </li>
                    <li class="next" v-if="pagination.current_page != pagination.last_page">
                      <a href="#0" @click.prevent="getProducts(pagination.current_page + 1)"
                        ><i class="flaticon-next-1" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End product-grid-->
    </main>
  </div>
</template>

<script>
export default {
  name: "Index",
  mounted() {
    jQuery(document).trigger("changed");
    this.getProducts();
    this.getFilterList();
  },
  data() {
    return {
      products: [],
      popupProduct: null,
      filterList: [],
      categories: [],
      tags: [],
      colors: [],
      priceFrom: null,
      priceTo: null,
      sortType: null,
      pagination: [],
    };
  },
  methods: {
    addCart(productId, isSingle) {
      let
        cart = localStorage.getItem('cart'),
        quantity = isSingle ? 1 : jQuery('.qtyValue').val(),
        newProduct = [{'id': productId, 'quantity': quantity}];

      jQuery('.qtyValue').val(1);

      if (cart == null)
      {
        cart = localStorage.setItem('cart', JSON.stringify(newProduct));
      } else
      {
        cart = JSON.parse(cart);
        cart.forEach(item => {
          if (item.id == productId)
          {
            item.quantity += Number(quantity);
            newProduct = null;
          }
        });
        Array.prototype.push.apply(cart, newProduct);
        localStorage.setItem('cart', JSON.stringify(cart));
      }
    },
    sortProducts(sortType) {
      this.getProducts();
    },
    getProducts(page = 1) {
      this.axios.post("/api/products", {
        categories: this.categories,
        tags: this.tags,
        colors: this.colors,
        priceFrom: this.priceFrom,
        priceTo: this.priceTo,
        sort: this.sortType,
        page: page
      })
        .then((response) => {
          this.products = response.data.data;
          this.pagination = response.data.meta;
        });
    },
    getProduct(id) {
      this.axios.get(`/api/products/show/${id}`)
        .then((response) => {
          this.popupProduct = response.data.data;
        })
        .finally((response) => {
          jQuery(document).trigger("changed");
        });
    },
    getFilterList() {
      this.axios.get("/api/filters/list")
        .then((response) => {
          this.filterList = response.data;
        });
    },
    addTag(id) {
      if (this.tags.includes(id))
      {
        this.tags = this.tags.filter(element => {
          return element != id;
        });
      } else
      {
        this.tags.push(id);
      }
    },
    addColor(id) {
      if (this.colors.includes(id))
      {
        this.colors = this.colors.filter(element => {
          return element != id;
        });
      } else
      {
        this.colors.push(id);
      }
    },
    filterProducts() {
      let prices = jQuery('#priceRange').val();
      prices = prices.replace(/[s+]|[$]/g, '').split('-');
      this.priceFrom = prices[0];
      this.priceTo = prices[1];
      this.getProducts();
    }
  },
};
</script>
