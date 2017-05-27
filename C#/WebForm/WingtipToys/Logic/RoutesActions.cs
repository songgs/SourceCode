using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Routing;

namespace WingtipToys.Logic
{
    public static class RoutesActions
    {
        public static void RegisterCustomRoutes(RouteCollection routes)
        {
            routes.MapPageRoute("Default", "", "~/Views/Default.aspx");
            routes.MapPageRoute("ProductsbyCategoryRoute", "Category/{categoryName}", "~/Views/ProductList.aspx");
            routes.MapPageRoute("ProductbyNameRoute", "Product/{productName}", "~/Views/ProductDetails.aspx");
        }
    }
}