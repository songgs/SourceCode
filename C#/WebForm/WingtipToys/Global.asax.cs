﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Optimization;
using System.Web.Routing;
using System.Web.Security;
using System.Web.SessionState;

using System.Data.Entity;
using WingtipToys.Models;
using WingtipToys.Logic;

namespace WingtipToys
{
    public class Global : HttpApplication
    {
        void Application_Start(object sender, EventArgs e)
        {
            // Code that runs on application startup
            RouteConfig.RegisterRoutes(RouteTable.Routes);
            BundleConfig.RegisterBundles(BundleTable.Bundles);

            //init product related database
            Database.SetInitializer(new ProductDatabaseInitializer());

            //create custome role: canEdit
            //  user: canEditUser@wingtiptoys.com/pa$$word1
            RoleActions roleActions = new RoleActions();
            roleActions.AddUserAndRole();

            RoutesActions.RegisterCustomRoutes(RouteTable.Routes);
        }

        // Code that runs when an unhandled error occurs.
        void Application_Error(object sender, EventArgs e)
        {
            Exception exc = Server.GetLastError();
            if (exc is HttpUnhandledException)
                Server.Transfer("ErrorPage.aspx?handler=Application_Error%20-%20Global.asax", true);
        }
      
    }
}