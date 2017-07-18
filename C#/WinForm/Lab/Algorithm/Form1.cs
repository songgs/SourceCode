using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Algorithm
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            Init();
        }

        private void Init()
        {
            GetIntArrayFromString("12fds3g45,wg.r653");
        }

        //
        private Array GetIntArrayFromString(string strSource)
        {
            if (strSource == null || strSource.Length <= 0)
                return null;

            char[] arySource = strSource.ToArray();
            List<int> list = new List<int>();

            //取数字变数组 
            string tmp = string.Empty;
            for (int i = 0; i < arySource.Length; i++)
            {
                if (char.IsDigit(arySource[i]))
                {
                    tmp = tmp + arySource[i].ToString();
                    if (i == arySource.Length - 1)
                        list.Add(int.Parse(tmp));
                }
                else if (i - 1 > 0 && char.IsDigit(arySource[i-1]))
                {
                    list.Add(int.Parse(tmp));
                    tmp = string.Empty;
                }
            }

            return list.ToArray();
        }
    }
}
