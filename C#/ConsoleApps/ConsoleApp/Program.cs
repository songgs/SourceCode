using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.ReadLine();
            TestValueTypeandReferenceType test = new TestValueTypeandReferenceType();
            test.Test();

            TestBoxingandUnboxing test2 = new TestBoxingandUnboxing();
            test2.test();

        }
    }
}
