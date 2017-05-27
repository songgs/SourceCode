using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using WingtipToys.Logic;

namespace WingtipToys.Views
{
    public partial class AddToCart : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            string rawId = Request.QueryString["ProductID"];
            int tempId;
            if (!string.IsNullOrEmpty(rawId) && int.TryParse(rawId, out tempId))
                using (ShoppingCartActions usershopcart = new ShoppingCartActions())
                    usershopcart.AddToCart(Convert.ToInt16(rawId));
            else
                throw new Exception("Error: you should setting a ProductId.");

            Response.Redirect("/Views/ShoppingCart.aspx");
        }
    }
}