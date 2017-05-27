using System;
using System.Collections.Generic;
using System.Collections.Specialized;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using WingtipToys.Logic;
using WingtipToys.Models;

namespace WingtipToys.Views
{
    public partial class ShoppingCart : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            //set price total
            using (ShoppingCartActions action = new ShoppingCartActions())
            {
                decimal cartTotal = action.GetTotal();
                lblTotal.Text = string.Format("{0:c}", cartTotal);

                if (cartTotal <= 0)
                {
                    LabelTotalText.Text = "";
                    ShoppingCartTitle.InnerText = "shopping cart is empty";
                    UpdateBtn.Visible = false;
                    CheckoutImageBtn.Visible = false;
                }
            }
        }

        public List<CartItem> GetShoppingCartItems()
        {
            ShoppingCartActions actions = new ShoppingCartActions();
            return actions.GetCartItems();
        }

        protected void UpdateBtn_Click(object sender, EventArgs e)
        {
            UpdateCartItems();
        }

        //update cart item with db
        private List<CartItem> UpdateCartItems()
        {
            using (ShoppingCartActions shopaction = new ShoppingCartActions())
            {
                string cartId = shopaction.GetCartId().ToString();
                ShoppingCartActions.ShoppingCartUpdates[] cartUpdates = new ShoppingCartActions.ShoppingCartUpdates[CartList.Rows.Count];

                //collect item in cart to update list
                for (int i = 0; i < CartList.Rows.Count; i++)
                {
                    IOrderedDictionary rowValues = GetValues(CartList.Rows[i]);
                    cartUpdates[i].ProductId = Convert.ToInt32(rowValues["ProductID"]);

                    CheckBox cbRm = CartList.Rows[i].FindControl("Remove") as CheckBox;
                    cartUpdates[i].RemoveItem = cbRm.Checked;

                    TextBox qnt = CartList.Rows[i].FindControl("PurchaseQuantity") as TextBox;
                    cartUpdates[i].PurchaseQuantity = Convert.ToInt16(qnt.Text);
                }

                shopaction.UpdateShoppingCartDatabase(cartId,cartUpdates);
                CartList.DataBind();
                lblTotal.Text = string.Format("{0:c}",shopaction.GetTotal());
                return shopaction.GetCartItems();
            }
        }

        //pay checkout 
        protected void CheckoutBtn_Click(object sender, ImageClickEventArgs e)
        {
            using (ShoppingCartActions usersShoppingCart = new ShoppingCartActions())
            {
                Session["payment_amt"] = usersShoppingCart.GetTotal();
            }
            Response.Redirect("~/Checkout/CheckoutStart.aspx");
        }

        public static IOrderedDictionary GetValues(GridViewRow row)
        {
            IOrderedDictionary rowValues = new OrderedDictionary();
            foreach (DataControlFieldCell cell in row.Cells)
                if (cell.Visible)
                    cell.ContainingField.ExtractValuesFromCell(rowValues, cell, row.RowState, true);

            return rowValues;
        }
    }
}