using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace WingtipToys
{
    public partial class _Default : Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            //throw new InvalidOperationException("An InvalidOperationException " +
            //    "occurred in the Page_Load handler on the Default.aspx page.");
        }

        private void Page_Error(object sender, EventArgs e)
        {
            Exception exc = Server.GetLastError();
            switch (exc.GetType().Name)
            {
                case "InvalidOperationException":

                    Server.Transfer("ErrorPage.aspx?handler=Page_Error%20-%20Default.aspx", true);
                    break;

                default:
                    { Server.Transfer("ErrorPagr.aspx"); }
                    break;
            }

        }
    }
}