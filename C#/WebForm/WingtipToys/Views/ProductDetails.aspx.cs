using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.ModelBinding;
using System.Web.UI;
using System.Web.UI.WebControls;
using WingtipToys.Models;

namespace WingtipToys
{
    public partial class ProductDetails : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        public IQueryable<Product> GetPro([QueryString("productID")] int? productId, [RouteData] string productName,string asd)
        {
            var _db = new ProductContext();
            IQueryable<Product> query = _db.Products;
            if (productId.HasValue && productId > 0)
                query = query.Where(a => a.ProductID == productId);

            if (!string.IsNullOrEmpty(productName))
                query = query.Where(a => string.Compare(a.ProductName, productName) == 0);
            else
                query = null;

            return query;
        }
    }
}