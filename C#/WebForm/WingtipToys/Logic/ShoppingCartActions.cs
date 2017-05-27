using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using WingtipToys.Models;

namespace WingtipToys.Logic
{
    public class ShoppingCartActions : IDisposable
    {
        public string ShoppingCartId { get; set; }

        public ProductContext _db = new ProductContext();

        public const string CartSessionKey = "CartId";

        //add item to cart
        public void AddToCart(int id)
        {
            ShoppingCartId = GetCartId();

            var cartItem = _db.ShoppingCartItems.SingleOrDefault(
                c => c.CartId == ShoppingCartId && c.ProductId == id);

            if (cartItem != null)
            {
                cartItem.Quantity++;
            }
            else
            {
                cartItem = new CartItem
                {
                    ItemId = Guid.NewGuid().ToString(),
                    ProductId = id,
                    CartId = ShoppingCartId,
                    Product = _db.Products.SingleOrDefault(p => p.ProductID == id),
                    Quantity = 1,
                    DateCreated = DateTime.Now
                };

                _db.ShoppingCartItems.Add(cartItem);
            }

            _db.SaveChanges();
        }

        //total price in cart
        public decimal GetTotal()
        {
            ShoppingCartId = GetCartId();
            decimal? total = decimal.Zero;
            total = (decimal?)(from CartItems in _db.ShoppingCartItems
                               where CartItems.CartId == ShoppingCartId
                               select CartItems.Quantity * CartItems.Product.UnitPrice).Sum();
            return total ?? decimal.Zero;
        }

        //return current requst session  cartid
        public string GetCartId()
        {
            if (HttpContext.Current.Session[CartSessionKey] != null)
                return HttpContext.Current.Session[CartSessionKey].ToString();

            if (!string.IsNullOrWhiteSpace(HttpContext.Current.User.Identity.Name))
                HttpContext.Current.Session[CartSessionKey] = HttpContext.Current.User.Identity.Name.ToString();
            else
                HttpContext.Current.Session[CartSessionKey] = Guid.NewGuid();

            return HttpContext.Current.Session[CartSessionKey].ToString();

        }

      
        //return cart
        public ShoppingCartActions GetCart(HttpContext context)
        {
            using (var cart = new ShoppingCartActions())
            {
                cart.ShoppingCartId = cart.GetCartId();
                return cart;
            }
        }
        
        //return item in current cart
        public List<CartItem> GetCartItems()
        {
            ShoppingCartId = GetCartId();
            return _db.ShoppingCartItems.
                Where(a => a.CartId == ShoppingCartId).ToList();
        }

        public struct ShoppingCartUpdates
        {
            public int ProductId;
            public int PurchaseQuantity;
            public bool RemoveItem;
        }

        //update db according to cart item 
        public void UpdateShoppingCartDatabase(string cartId, ShoppingCartUpdates[] cartItemUpdates)
        {
            using (var db = new ProductContext())
            {
                try
                {
                    int cartItemCount = cartItemUpdates.Count();
                    List<CartItem> myCart = GetCartItems();

                    foreach (var cartItem in myCart)
                        for (int i = 0; i < cartItemCount; i++)
                        {
                            if (cartItem.Product.ProductID != cartItemUpdates[i].ProductId)
                                continue;
                            if (cartItemUpdates[i].PurchaseQuantity < 1 || cartItemUpdates[i].RemoveItem == true)
                                RemoveItem(cartId, cartItem.ProductId);
                            else
                                UpdateItem(cartId, cartItem.ProductId, cartItemUpdates[i].PurchaseQuantity);
                        }
                }
                catch (Exception e)
                { throw new Exception("error: Unable update cart db - " + e.Message.ToString()); }
            }
        }

        //rm item in db
        private void RemoveItem(string cartId, int productId)
        {
            using (var _db = new ProductContext())
            {
                try
                {
                    var myItem = (from c in _db.ShoppingCartItems
                                  where c.CartId == cartId && c.Product.ProductID == productId
                                  select c).FirstOrDefault();
                    if (myItem == null)
                        return;

                    _db.ShoppingCartItems.Remove(myItem);
                    _db.SaveChanges();
                }
                catch (Exception e)
                { throw new Exception("error: Unable remove item in cart - " + e.Message.ToString()); }
            }
        }

        //update quantity in db
        private void UpdateItem(string cartId, int productId, int purchaseQuantity)
        {
            using (var _db = new ProductContext())
            {
                try
                {
                    var myItem = (from c in _db.ShoppingCartItems
                                  where c.CartId == cartId && c.Product.ProductID == productId
                                  select c).FirstOrDefault();
                    if (myItem == null)
                        return;
                    myItem.Quantity = purchaseQuantity;
                    _db.SaveChanges();
                }
                catch (Exception e)
                { throw new Exception("error: Unable update item in cart - " + e.Message.ToString()); }
            }
        }

        //empty current cart
        public void EmptyCart()
        {
            ShoppingCartId = GetCartId();
            var cartItems = _db.ShoppingCartItems.Where(c => c.CartId == ShoppingCartId);
            foreach (var cartItem in cartItems)
                _db.ShoppingCartItems.Remove(cartItem);

            _db.SaveChanges();
        }

        public int GetCount()
        {
            ShoppingCartId = GetCartId();
            // Get the count of each item in the cart and sum them up    
            if (_db.ShoppingCartItems.Count() <= 0)
                return 0;      
            int? count = (from cartItems in _db.ShoppingCartItems
                          where cartItems.CartId == ShoppingCartId
                          select (int?)cartItems.Quantity).Sum();
            // Return 0 if all entries are null         
            return count ?? 0;
            //int? count = (from cartItems in _db.ShoppingCartItems
            //              where cartItems.CartId == ShoppingCartId
            //              select (int?)cartItems.Quantity).Sum();
            //return count ?? 0;
        }

        //replace session key guid with username
        public void MigrateCart(string cartId, string username)
        {
            var shoppingCart = _db.ShoppingCartItems.Where(a=>a.CartId==cartId);
            foreach (CartItem item in shoppingCart)
                item.CartId = username;

            HttpContext.Current.Session[CartSessionKey] = username;
            _db.SaveChanges();
        }




        public void Dispose()
        {
            if (_db != null)
            {
                _db.Dispose();
                _db = null;
            }
        }
    }
}