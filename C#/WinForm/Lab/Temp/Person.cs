using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Temp
{
    class Person
    {
        public string name;

        public Person(string p)
        {
            // TODO: Complete member initialization
            this.name = p;

        }
        public Person( )
        {
            // TODO: Complete member initialization
            this.name = "no one";

        }

        public void count()
        {
            int cnt = 0;
            Console.WriteLine(cnt);
        }
    }
}
