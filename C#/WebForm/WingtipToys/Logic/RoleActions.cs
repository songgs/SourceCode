using Microsoft.AspNet.Identity;
using Microsoft.AspNet.Identity.EntityFramework;
using System;
using WingtipToys.Models;

namespace WingtipToys.Logic
{
    public class RoleActions
    {
        internal void AddUserAndRole()
        {
            ApplicationDbContext context = new ApplicationDbContext();
            IdentityResult IdRole;
            IdentityResult IdUser;

            var roleStore = new RoleStore<IdentityRole>(context);
            var roleMgr = new RoleManager<IdentityRole>(roleStore);

            if (!roleMgr.RoleExists("canEdit"))
                IdRole = roleMgr.Create(new IdentityRole { Name = "canEdit" });

            var userMgr = new UserManager<ApplicationUser>(new UserStore<ApplicationUser>(context));
            string userEmail = "canEditUser@wingtiptoys.com";
            var appuser = new ApplicationUser
            {
                UserName = userEmail,
                Email = userEmail
            };

            IdUser = userMgr.Create(appuser,"pa$$word1");
            if (!userMgr.IsInRole(userMgr.FindByEmail(userEmail).Id, "canEdit"))
                IdUser = userMgr.AddToRole(userMgr.FindByEmail(userEmail).Id, "canEdit");

        }
    }
}