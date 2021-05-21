package test;

import utils.MetodosComunes;
import utils.PropertiesManager;

public class Lanzador {

	public static void main(String[] args) {
		//Lanza todos los test juntos
		PropertiesManager pm = new PropertiesManager();
		pm.readProperies();
		MetodosComunes mc = new MetodosComunes();
		mc.setRutaEvidencias(pm.rutaEvidencias);
		mc.createExcelReport();
		String[] tests= {pm.rutaEvidencias};
		Test01.main(tests);
		Test02.main(tests);
		Test03.main(tests);
		Test04.main(tests);
		Test05.main(tests);
		Test06.main(tests);
		Test07.main(tests);
		Test08.main(tests);
		Test09.main(tests);
		Test10.main(tests);
		Test11.main(tests);
		Test12.main(tests);
		Test13.main(tests);
		Test14.main(tests);
		Test15.main(tests);
		Test16.main(tests);
		Test17.main(tests);
		Test18.main(tests);
		Test19.main(tests);
		Test20.main(tests);
		Test21.main(tests);
	}
}
