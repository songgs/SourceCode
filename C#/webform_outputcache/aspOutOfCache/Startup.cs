using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(aspOutOfCache.Startup))]
namespace aspOutOfCache
{
    public partial class Startup {
        public void Configuration(IAppBuilder app) {
            ConfigureAuth(app);
        }
    }
}
