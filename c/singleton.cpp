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

        void print(string name) {
            cout << name << " object: \t\t" << instance->getValue() << endl;
            cout << name << " object address: \t" << instance << endl;
        }
};

Singleton* Singleton::instance = 0;

int main() {
    Singleton* first = Singleton::getInstance();
    Singleton* second = Singleton::getInstance();

    first->print("First");
    second->print("Second");

    first->setValue(5);

    first->print("First");
    second->print("Second");

    second->setValue(18);

    first->print("First");
    second->print("Second");

    return 0;
}
