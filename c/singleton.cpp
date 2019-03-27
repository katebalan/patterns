#include <iostream>

using namespace std;

class Singleton {
    private:
        static Singleton* instance;
        int value;

        Singleton() {};

        Singleton(const Singleton&) {};
        Singleton& operator=(Singleton&) {};

    public:
        static Singleton* getInstance() {
            if (!instance) {
                instance = new Singleton();
            }
            return instance;
        }

        int getValue() {
            return value;
        }

        void setValue(int val) {
            value = val;
        }
};

Singleton* Singleton::instance = 0;

int main() {
    Singleton* one = Singleton::getInstance();
    Singleton* two = Singleton::getInstance();

    cout << "First object: \t\t" << one->getValue() << endl;
    cout << "First object address: \t" << one << endl;
    cout << "Second object: \t\t" << two->getValue() << endl;
    cout << "Second object address: \t" << two << endl;

    two->setValue(5);

    cout << "First object: \t\t" << one->getValue() << endl;
    cout << "First object address: \t" << one << endl;
    cout << "Second object: \t\t" << two->getValue() << endl;
    cout << "Second object address: \t" << two << endl;

    one->setValue(18);

    cout << "First object: \t\t" << one->getValue() << endl;
    cout << "First object address: \t" << one << endl;
    cout << "Second object: \t\t" << two->getValue() << endl;
    cout << "Second object address: \t" << two << endl;

    return 0;
}
